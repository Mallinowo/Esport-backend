# ADR-0006: Generowanie terminarza i drabinki po stronie serwera

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: system automatycznie generuje terminarz lub drabinkę turniejową, i to po stronie backendu. Obsługiwane są dwa tryby: liga (każdy z każdym) i puchar.

## Decyzja

Po zamknięciu zapisów (automatycznie po terminie) backend:
- dla ligi generuje terminarz kołowy: każda drużyna gra z każdą raz; przy nieparzystej liczbie drużyn w każdej kolejce jedna drużyna pauzuje; kolejki dostają daty od dnia startu rozgrywek;
- dla pucharu losuje pary; gdy liczba drużyn nie jest potęgą dwójki, najwyżej rozstawione drużyny dostają wolny los i przechodzą dalej; każdy mecz wie, do którego meczu przechodzi zwycięzca.

Po wygenerowaniu rozgrywki przechodzą w status „W trakcie”. Frontend tylko wyświetla gotowy terminarz i drabinkę.

## Konsekwencje

### Pozytywne

- Jedno miejsce z logiką, spójne wyniki dla wszystkich klientów.
- Generatory są czystą logiką i dobrze nadają się do testów na przykładach (np. 5 drużyn to 5 kolejek po 2 mecze).

### Negatywne

- Nierozstrzygnięte: co zrobić, gdy zapisało się mniej drużyn niż minimum (kwestia otwarta).

## Powiązane dokumenty

- [Backlog: US-07, US-08](../lab/docs/02-planowanie/backlog-management.md)
- [Event storming](../lab/docs/02-planowanie/event-storming.md)
