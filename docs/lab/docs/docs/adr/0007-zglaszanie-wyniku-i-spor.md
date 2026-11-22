# ADR-0007: Zgłaszanie wyniku: potwierdzenie przez rywala i spór

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: wynik musi zostać zaakceptowany przez kapitana drużyny przeciwnej lub administratora rozgrywek, a w razie konfliktu obie strony mogą dodać komentarz i załączniki. Chcemy, żeby wynik trafiał do tabeli bez udziału organizatora, gdy rywale się zgadzają.

## Decyzja

Kapitan jednej drużyny zgłasza wynik, kapitan drugiej dostaje powiadomienie i może go potwierdzić albo zgłosić spór.
- Zgłoszonego wyniku nie da się edytować; błędny wynik jest korygowany przez spór.
- Drugie zgłoszenie do tego samego meczu jest odrzucane; gdy obaj kapitanowie zgłaszają naraz, wygrywa pierwsze.
- Spór może zgłosić tylko kapitan rywali, dopóki wynik czeka na potwierdzenie. Komentarz jest wymagany (10-1000 znaków), dozwolone są do 3 zrzutów ekranu (PNG, JPG, WEBP do 5 MB).
- Mecz sporny nie wlicza się do tabeli. Ostateczny wynik wpisuje organizator (spory może rozstrzygać także administrator).
- W pucharze remis jest niedozwolony.
- Po potwierdzeniu lub rozstrzygnięciu sporu mecz jest zakończony.
- Pliki są zapisywane na dysku.

## Rozważane opcje

- Wycofanie zgłoszenia i automatyczne zatwierdzenie po 24 godzinach: poza zakresem na ten moment.

## Konsekwencje

### Pozytywne

- Typowy przypadek (rywale się zgadzają) nie wymaga udziału organizatora.
- Pełna historia zgłoszeń jest widoczna w szczegółach meczu.

### Negatywne

- Gdy rywal nie reaguje, mecz czeka; na razie decyduje organizator (kwestia otwarta).
- Obsługa plików wymaga walidacji typu i rozmiaru po stronie serwera.

## Powiązane dokumenty

- [Backlog: US-14, US-15, US-16, US-17](../lab/docs/02-planowanie/backlog-management.md)
- [Event storming](../lab/docs/02-planowanie/event-storming.md)
