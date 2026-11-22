# ADR-0002: Laravel jako framework backendu

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Backend musi udostępniać REST API, obsługiwać logowanie e-mailem i przez Discord, wyniki na żywo przez WebSocket, log aktywności oraz dokumentację OpenAPI. Czas jest ograniczony: backlog liczy 237 SP, a projekt jest realizowany w sprintach dwutygodniowych.

## Decyzja

Backend jest zbudowany w Laravelu. Wykorzystujemy pakiety z jego ekosystemu: Sanctum, Socialite, Reverb, Scramble oraz Spatie Activitylog.

## Konsekwencje

### Pozytywne

- Dla większości wymagań istnieje gotowy pakiet, co skraca czas wytwarzania.
- Wbudowane migracje, seedery, walidacja i narzędzia testowe (PHPUnit).

### Negatywne

- Zespół backendowy jest związany z PHP i ekosystemem Laravela.
- Rozwiązania z pakietów trzeba dopasować do ich ograniczeń.

## Powiązane dokumenty

- [Estymacja](../lab/docs/02-planowanie/estymacja.md)
