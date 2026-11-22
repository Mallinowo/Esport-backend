# Persony

Persony reprezentują typowych użytkowników platformy do prowadzenia lig i turniejów e-sportowych. Oparte są na aktorach z [event stormingu](../02-planowanie/event-storming.md) i na historyjkach z [User Stories](user-stories.md). Imiona, wiek i cytaty są wymyślone na potrzeby projektu.

> Dokument roboczy: opisy motywacji i frustracji to założenia zespołu, nie wyniki badań z użytkownikami.

## Podsumowanie

| Persona | Rola w systemie | Główne historyjki |
|---------|-----------------|-------------------|
| Kuba, kibic | Gość | US-09, US-10, US-11, US-12, US-13 |
| Ola, gracz | Użytkownik | US-01, US-02, US-03, US-10 |
| Marek, kapitan | Kapitan | US-03, US-04, US-06, US-14, US-15, US-16 |
| Natalia, organizatorka | Organizator | US-05, US-07, US-08, US-17 |
| Admin Piotr | Administrator | US-19, US-20 |

## 1. Kuba, kibic (Gość)

- **Wiek:** 19 lat · **Urządzenie:** głównie telefon
- **Kim jest:** ogląda e-sport, nie ma jeszcze konta i nie gra w żadnej drużynie.
- **Cele:** szybko sprawdzić, jakie ligi i turnieje trwają, kto prowadzi w tabeli i kto awansował w pucharze.
- **Frustracje:** konieczność zakładania konta tylko po to, by coś przeczytać; poziome przewijanie na telefonie; nieaktualne wyniki.
- **Czego potrzebuje od systemu:** przeglądanie bez logowania, czytelna tabela i drabinka na telefonie, wyniki na żywo.
- **Scenariusz:** otwiera listę rozgrywek, filtruje po grze, wchodzi w ligę i sprawdza zakładkę Tabela. Chce obserwować ligę, więc system prosi o zalogowanie.

## 2. Ola, gracz (Użytkownik)

- **Wiek:** 22 lata · **Urządzenie:** laptop i telefon
- **Kim jest:** gra rekreacyjnie, ma konto na Discordzie, szuka drużyny.
- **Cele:** zalogować się bez zakładania kolejnego hasła, dołączyć do drużyny, obserwować ligę swojej drużyny.
- **Frustracje:** kolejne hasła, długie formularze rejestracji, brak informacji, czy zaproszenie do drużyny dotarło.
- **Czego potrzebuje od systemu:** logowanie przez Discord (avatar z Discorda), lista zaproszeń z przyciskami „Przyjmij” i „Odrzuć”, obserwowanie rozgrywek.
- **Scenariusz:** loguje się przez Discord, dostaje zaproszenie od kapitana, przyjmuje je i od razu widzi się w składzie drużyny.

## 3. Marek, kapitan (Kapitan)

- **Wiek:** 24 lata · **Urządzenie:** telefon przy meczu, laptop do reszty
- **Kim jest:** prowadzi drużynę „Nocna Zmiana”, odpowiada za skład, zapisy i wyniki.
- **Cele:** skompletować skład przed zapisami, zapisać drużynę do ligi, szybko zgłosić wynik po meczu i nie przegapić potwierdzenia wyniku rywali.
- **Frustracje:** wynik wpisany przez rywali niezgodnie z prawdą, brak dowodów, spory rozstrzygane „na Discordzie”.
- **Czego potrzebuje od systemu:** zapraszanie po nazwie użytkownika, przycisk „Zapisz drużynę” w czasie zapisów, lista meczów do rozliczenia, zgłoszenie wyniku z możliwością dołączenia zrzutu ekranu, możliwość zgłoszenia sporu z komentarzem.
- **Scenariusz:** po meczu zgłasza wynik 2:0. Kapitan „Szybkich Graczy” klika „Potwierdź”, mecz jest zakończony, a tabela uwzględnia wynik.

## 4. Natalia, organizatorka (Organizator)

- **Wiek:** 27 lat · **Urządzenie:** laptop
- **Kim jest:** prowadzi lokalne ligi e-sportowe, do tej pory w arkuszu kalkulacyjnym.
- **Cele:** utworzyć ligę lub puchar bez ręcznego układania par i kolejek, ustawić zasady punktacji, rozstrzygać spory w jednym miejscu.
- **Frustracje:** ręczne liczenie tabeli, pomyłki w terminarzu, wyniki zgłaszane na czacie i trudne do sprawdzenia.
- **Czego potrzebuje od systemu:** formularz tworzenia rozgrywek (gra, format, limity drużyn, terminy zapisów, zasady punktacji), automatyczny terminarz i drabinka, widok sporu z obiema stronami i dowodami.
- **Scenariusz:** tworzy ligę, otwiera zapisy, po ich zamknięciu system sam generuje terminarz. Gdy wybuchnie spór, wpisuje ostateczny wynik z komentarzem.

## 5. Piotr, administrator (Administrator)

- **Wiek:** 30 lat · **Urządzenie:** laptop
- **Kim jest:** opiekun platformy, odpowiada za bezpieczeństwo i porządek w systemie.
- **Cele:** kontrolować, kto może tworzyć rozgrywki, i móc sprawdzić, kto co zmienił.
- **Frustracje:** brak śladów zmian, niejasne uprawnienia.
- **Czego potrzebuje od systemu:** lista użytkowników z wyszukiwaniem i przełącznikiem roli organizatora, log aktywności (zgłoszenia, potwierdzenia, spory, zmiany ról).
- **Scenariusz:** nadaje rolę organizatora nowej osobie, a później w logu sprawdza, kto zmienił wynik w spornym meczu.

## Powiązane dokumenty

[Event storming](../02-planowanie/event-storming.md) · [User Stories](user-stories.md) · [Backlog](../02-planowanie/backlog-management.md)
