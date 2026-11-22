# ADR-0010: Dokumentacja OpenAPI (Scramble), wygenerowany klient i mocki MSW

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: backend musi być udokumentowany w formie OpenAPI. Frontend powstaje równolegle z backendem, więc potrzebuje stabilnego kontraktu API.

## Decyzja

- Backend generuje specyfikację OpenAPI przez Scramble (dostępna pod `/docs/api`).
- Frontend generuje z niej typy i klienta API.
- Do czasu gotowości backendu frontend odpowiada na zapytania mockami MSW opartymi na kontrakcie API (`src/mocks`); te same handlery są używane w testach jednostkowych (Vitest). Ustawienie `VITE_API_MOCKS=false` wyłącza mocki.

## Konsekwencje

### Pozytywne

- Dokumentacja i typy frontendu są zgodne z backendem.
- Frontend nie musi czekać na gotowy backend.

### Negatywne

- Zmiana API na backendzie wymaga ponownego wygenerowania klienta.
- Mocki trzeba aktualizować razem z kontraktem.

## Powiązane dokumenty

- [Narzędzia OpenAPI](../lab/docs/03-realizacja/narzedzia-openapi.md)
