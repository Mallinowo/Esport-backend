# ADR-0011: Log aktywności: Spatie Activitylog

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: administrator widzi logi z aplikacji. Według historyjki US-20 log ma pokazywać, kto zgłosił, potwierdził lub zmienił wynik oraz kto zmieniał role.

## Decyzja

Używamy pakietu Spatie Activitylog. Log zapisuje zgłoszenia, potwierdzenia, spory, rozstrzygnięcia i zmiany ról wraz z autorem i datą. Administrator ma endpoint z listą stronicowaną i filtrowaną po typie zdarzenia.

## Konsekwencje

### Pozytywne

- Możliwość prześledzenia zmian wyników i ról, pomocna przy sporach.

### Negatywne

- Historyjka ma priorytet Could (US-20); w razie braku czasu jest pierwszą do odłożenia.

## Powiązane dokumenty

- [Backlog: US-20](../lab/docs/02-planowanie/backlog-management.md)
