# ADR-0008: Tabela i drabinka liczone z zakończonych meczów

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: system automatycznie aktualizuje tabelę ligową, drabinkę turniejową oraz bilans zwycięstw i porażek.

## Decyzja

Tabela i drabinka nie są osobnymi agregatami, tylko są wyliczane z zakończonych meczów. Do tabeli wliczają się wyłącznie mecze ze statusem „zakończony”. Punkty za wygraną, remis i porażkę oraz kolejność tie-breakerów pochodzą z zasad danych rozgrywek. Po meczu ligowym tabela jest przeliczana, a po pucharowym zwycięzca przechodzi do następnego meczu.

## Konsekwencje

### Pozytywne

- Jedno źródło prawdy: mecze.
- Zmiana wyniku (np. po sporze) automatycznie poprawia tabelę i drabinkę.

### Negatywne

- Przeliczanie przy każdej zmianie; przy dużej liczbie meczów może być potrzebna optymalizacja.

## Powiązane dokumenty

- [Backlog: US-11, US-13](../lab/docs/02-planowanie/backlog-management.md)
- [Event storming](../lab/docs/02-planowanie/event-storming.md)
