# ADR-0003: PostgreSQL jako baza danych

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Dane są silnie relacyjne: konta, drużyny, składy, zaproszenia, rozgrywki, zapisy, mecze, zgłoszenia wyników i spory. Potrzebna jest spójność danych, np. limit drużyn w rozgrywkach i jedno zgłoszenie wyniku na mecz.

## Decyzja

Używamy PostgreSQL. Testy w GitHub Actions są uruchamiane na PostgreSQL, żeby środowisko testowe odpowiadało docelowemu.

## Konsekwencje

### Pozytywne

- Ograniczenia i transakcje po stronie bazy wspierają spójność danych.
- Testy w CI działają na tej samej bazie co środowisko docelowe.

### Negatywne

- Schemat bazy wymaga starannych migracji i seederów (zadania techniczne backendu).

## Powiązane dokumenty

- [Backlog](../lab/docs/02-planowanie/backlog-management.md)
