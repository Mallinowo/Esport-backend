# Event Storming

Platforma do prowadzenia lig i turniejów e-sportowych. Zespół: Jakub Maliński (lider), Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin. Collegium Witelona, informatyka, grupa 1.1. Data: 18.11.2026.

Najpierw wypisaliśmy wszystko, co się dzieje w systemie (od założenia konta do końca rozgrywek) i ułożyliśmy to po kolei. Potem dopisaliśmy, kto co robi, co dzieje się automatycznie i gdzie mamy wątpliwości. Na końcu podzieliliśmy to na części systemu. Z tego powstał [backlog](backlog-management.md).

## Legenda

Kolory jak na karteczkach:

| Kolor | Znaczenie |
|-------|-----------|
| pomarańczowy | zdarzenie |
| niebieski | komenda |
| żółty | aktor (kto to robi) |
| fioletowy | polityka (co system robi sam) |
| zielony | widok |
| czerwony | system zewnętrzny |
| różowy | pytanie lub problem |

## Aktorzy

| Aktor | Co robi |
|-------|---------|
| Gość | Bez konta; może tylko przeglądać rozgrywki, tabelę i drabinkę. |
| Użytkownik | Zalogowany; może obserwować rozgrywki i założyć drużynę. |
| Kapitan | Prowadzi drużynę: zaprasza graczy, zapisuje drużynę do rozgrywek, zgłasza i potwierdza wyniki. |
| Organizator | Tworzy rozgrywki, ustala zasady i rozstrzyga spory. |
| Administrator | Nadaje role, też może rozstrzygać spory. |
| System | Robi samo: zamyka zapisy, generuje terminarz i drabinkę, liczy tabelę. |

## Oś czasu

### 1. Konto i drużyna

```mermaid
flowchart LR
    classDef zd fill:#ffb74d,stroke:#e65100,color:#000
    classDef ko fill:#64b5f6,stroke:#0d47a1,color:#000
    classDef po fill:#ba68c8,stroke:#4a148c,color:#fff
    classDef ex fill:#e57373,stroke:#b71c1c,color:#000
    classDef pyt fill:#f48fb1,stroke:#880e4f,color:#000
    K1["Zarejestruj konto"]:::ko --> Z1["Konto zarejestrowane"]:::zd
    K2["Zaloguj przez Discord"]:::ko --> D["Discord"]:::ex --> Z2["Konto Discord połączone"]:::zd
    Z1 --> Z3["Użytkownik zalogowany"]:::zd
    Z2 --> Z3
    Z3 --> K3["Utwórz drużynę"]:::ko --> Z4["Drużyna utworzona"]:::zd
    Z4 --> P1["Twórca zostaje kapitanem"]:::po --> Z5["Kapitan wyznaczony"]:::zd
    Z5 --> K4["Zaproś zawodnika"]:::ko --> Z6["Zaproszenie wysłane"]:::zd
    Z6 --> K5["Przyjmij zaproszenie"]:::ko --> Z7["Zawodnik dołączył do drużyny"]:::zd
    Z6 --> K6["Odrzuć zaproszenie"]:::ko --> Z8["Zaproszenie odrzucone"]:::zd
    Z7 --> Q1{{"Czy można zmieniać skład w trakcie rozgrywek?"}}:::pyt
```

### 2. Rozgrywki: utworzenie i zapisy

```mermaid
flowchart LR
    classDef zd fill:#ffb74d,stroke:#e65100,color:#000
    classDef ko fill:#64b5f6,stroke:#0d47a1,color:#000
    classDef po fill:#ba68c8,stroke:#4a148c,color:#fff
    classDef pyt fill:#f48fb1,stroke:#880e4f,color:#000
    K1["Utwórz rozgrywki (Organizator)"]:::ko --> Z1["Rozgrywki utworzone jako szkic"]:::zd
    Z1 --> K2["Otwórz zapisy"]:::ko --> Z2["Zapisy otwarte"]:::zd
    Z2 --> K3["Zapisz drużynę (Kapitan)"]:::ko --> Z3["Drużyna zapisana"]:::zd
    Z2 --> K4["Obserwuj rozgrywki (Użytkownik)"]:::ko --> Z4["Rozgrywki obserwowane"]:::zd
    Z2 --> P1["Minął termin zapisów: zamknij zapisy"]:::po --> Z5["Zapisy zamknięte"]:::zd
    Z5 --> Q1{{"Co, jeśli zapisało się mniej drużyn niż minimum?"}}:::pyt
    Z3 --> Q2{{"Czy drużyna może grać w kilku rozgrywkach naraz?"}}:::pyt
```

### 3. Start rozgrywek: terminarz i drabinka

```mermaid
flowchart LR
    classDef zd fill:#ffb74d,stroke:#e65100,color:#000
    classDef po fill:#ba68c8,stroke:#4a148c,color:#fff
    classDef pyt fill:#f48fb1,stroke:#880e4f,color:#000
    Z0["Zapisy zamknięte"]:::zd --> P1["Liga: wygeneruj terminarz kołowy"]:::po --> Z1["Terminarz wygenerowany"]:::zd
    Z0 --> P2["Puchar: wylosuj drabinkę"]:::po --> Z2["Drabinka wygenerowana"]:::zd
    Z2 --> P3["Liczba drużyn nie jest potęgą 2: wolny los dla rozstawionych"]:::po --> Z3["Wolny los przyznany"]:::zd
    Z1 --> P4["Terminarz lub drabinka gotowe: rozpocznij rozgrywki"]:::po
    Z3 --> P4
    P4 --> Z4["Rozgrywki rozpoczęte"]:::zd
    Z4 --> Q1{{"Kto i kiedy zmienia mecz na „na żywo”?"}}:::pyt
```

### 4. Mecz i wynik

```mermaid
flowchart LR
    classDef zd fill:#ffb74d,stroke:#e65100,color:#000
    classDef ko fill:#64b5f6,stroke:#0d47a1,color:#000
    classDef po fill:#ba68c8,stroke:#4a148c,color:#fff
    classDef pyt fill:#f48fb1,stroke:#880e4f,color:#000
    K1["Zgłoś wynik (Kapitan A)"]:::ko --> Z1["Wynik zgłoszony"]:::zd
    Z1 --> P1["Powiadom kapitana B"]:::po
    P1 --> K2["Potwierdź wynik (Kapitan B)"]:::ko --> Z2["Wynik potwierdzony"]:::zd
    P1 --> K3["Zgłoś spór (Kapitan B)"]:::ko --> Z3["Spór otwarty"]:::zd
    Z3 --> K4["Rozstrzygnij spór (Organizator)"]:::ko --> Z4["Spór rozstrzygnięty"]:::zd
    Z2 --> P2["Wynik potwierdzony lub spór rozstrzygnięty: zakończ mecz"]:::po
    Z4 --> P2
    P2 --> Z5["Mecz zakończony"]:::zd
    Z1 --> Q1{{"Obaj kapitanowie zgłaszają naraz: wygrywa pierwsze zgłoszenie"}}:::pyt
    Z3 --> Q2{{"Organizator gra w swoich rozgrywkach: kto rozstrzyga?"}}:::pyt
```

Poza zakresem na ten moment: wycofanie zgłoszenia i automatyczne zatwierdzenie po 24 godzinach.

### 5. Po meczu: tabela, drabinka, na żywo, koniec

```mermaid
flowchart LR
    classDef zd fill:#ffb74d,stroke:#e65100,color:#000
    classDef po fill:#ba68c8,stroke:#4a148c,color:#fff
    classDef ex fill:#e57373,stroke:#b71c1c,color:#000
    Z0["Mecz zakończony"]:::zd --> P1["Mecz ligowy: przelicz tabelę"]:::po --> Z1["Tabela przeliczona"]:::zd
    Z0 --> P2["Mecz pucharowy: przesuń zwycięzcę dalej"]:::po --> Z2["Zwycięzca awansował"]:::zd
    Z1 --> P3["Zmiana meczu, tabeli lub drabinki: wyślij na żywo"]:::po
    Z2 --> P3
    P3 --> R["Reverb (WebSocket)"]:::ex --> Z3["Zmiana opublikowana na żywo"]:::zd
    Z1 --> P4["Wszystkie mecze ligi zakończone lub rozegrany finał: zakończ rozgrywki"]:::po
    Z2 --> P4
    P4 --> Z4["Rozgrywki zakończone, mistrz wyłoniony"]:::zd
    Z0 --> P5["Wynik zmieniony: zapisz w logu"]:::po --> Z5["Wpis w logu aktywności"]:::zd
```

## Zdarzenia (w kolejności)

1. Konto zarejestrowane
2. Użytkownik zalogowany (e-mailem albo przez Discorda)
3. Drużyna utworzona
4. Zaproszenie wysłane
5. Zawodnik dołączył do drużyny / zaproszenie odrzucone
6. Rozgrywki utworzone
7. Zapisy otwarte
8. Drużyna zapisana
9. Zapisy zamknięte
10. Terminarz wygenerowany / drabinka wygenerowana
11. Rozgrywki rozpoczęte
12. Wynik zgłoszony
13. Wynik potwierdzony / spór zgłoszony
14. Spór rozstrzygnięty
15. Mecz zakończony
16. Tabela przeliczona / zwycięzca przeszedł dalej
17. Rozgrywki zakończone

## Komendy

| Aktor | Komendy |
|-------|---------|
| Gość | zarejestruj się, zaloguj się, zaloguj przez Discord |
| Użytkownik | utwórz drużynę, przyjmij albo odrzuć zaproszenie, obserwuj rozgrywki |
| Kapitan | zaproś gracza, zapisz drużynę, zgłoś wynik, potwierdź wynik, zgłoś spór |
| Organizator | utwórz rozgrywki, otwórz zapisy, rozstrzygnij spór |
| Administrator | nadaj rolę |

## Agregaty

- **Konto**: użytkownik i jego role.
- **Drużyna**: nazwa, logo, kapitan i skład.
- **Rozgrywki**: liga albo puchar, zasady, terminy i zapisane drużyny.
- **Mecz**: dwie drużyny, wynik, zgłoszenia wyniku i ewentualny spór.

Tabelę i drabinkę liczymy z zakończonych meczów, więc nie są osobnym agregatem (zob. ADR-0008).

## Polityki

- Kto tworzy drużynę, zostaje jej kapitanem.
- Po terminie zapisów zapisy same się zamykają.
- Po zamknięciu zapisów w lidze generuje się terminarz (każdy z każdym), a w pucharze losuje się drabinkę.
- Gdy kapitan zgłosi wynik, drugi kapitan dostaje powiadomienie.
- Gdy wynik jest potwierdzony albo spór rozstrzygnięty, mecz się kończy.
- Po meczu ligowym przeliczamy tabelę, a po pucharowym zwycięzca przechodzi dalej.
- Każda zmiana wyniku, tabeli albo drabinki od razu pokazuje się na stronie.

## Widoki

Lista rozgrywek, strona ligi, tabela, terminarz, drabinka, mecze do rozliczenia i strona meczu z historią zgłoszeń.

## Systemy zewnętrzne

Discord (logowanie) i Reverb (wyniki na żywo).

## Części systemu

System dzieli się na kilka części, które mniej więcej odpowiadają podziałowi pracy w zespole:

1. Konta i role
2. Drużyny
3. Rozgrywki
4. Mecze i wyniki
5. Tabela i drabinka
6. Na żywo

## Pytania i problemy

| Pytanie | Odpowiedź |
|---------|-----------|
| Co, jeśli w pucharze nie ma 4, 8 albo 16 drużyn? | Najlepsze drużyny dostają wolny los i przechodzą dalej bez meczu. |
| Czy w pucharze może być remis? | Nie, formularz na to nie pozwala. |
| Co, jeśli kapitan wpisze zły wynik? | Nie może go poprawić; rywal zgłasza spór i decyduje organizator. |
| Co, jeśli rywal nie potwierdza wyniku? | Na razie decyduje organizator. |
| Co, jeśli zapisze się za mało drużyn? | Jeszcze nie wiemy. |
| Kto przełącza mecz na „na żywo”? | Jeszcze nie wiemy; może po prostu o godzinie meczu. |

## Powiązane dokumenty

[User Stories](../01-start-projektu/user-stories.md) · [Backlog](backlog-management.md) · [ADR](../../../adr/README.md)
