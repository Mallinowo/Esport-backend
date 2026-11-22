# ADR-0009: Wyniki na żywo: Laravel Reverb (WebSocket)

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: aktualizacje wyników i tabeli powinny wykorzystywać WebSocket lub Server-Sent Events. Kibic ma widzieć zmiany bez przeładowania strony.

## Decyzja

Używamy Laravel Reverb (WebSocket) po stronie backendu i Laravel Echo po stronie frontendu. Zmiana wyniku meczu, tabeli lub drabinki jest publikowana od razu. Po zerwaniu połączenia frontend pokazuje komunikat i odświeża dane co 15 sekund, aż połączenie wróci.

## Rozważane opcje

- Server-Sent Events: dopuszczone przez wymaganie projektu, nie wybrane.
- Odświeżanie strony co kilka sekund: rozwiązanie zapasowe, jeśli zabraknie czasu na Reverb.

## Konsekwencje

### Pozytywne

- Zmiany pojawiają się natychmiast, bez odświeżania.
- Reverb należy do ekosystemu Laravela.

### Negatywne

- Dodatkowy proces serwera WebSocket do uruchomienia i wdrożenia.
- Historyjka ma priorytet Should (US-18); w najgorszym wypadku zostanie zastąpiona odświeżaniem.

## Powiązane dokumenty

- [Backlog: US-18](../lab/docs/02-planowanie/backlog-management.md)
