# ADR-0004: Uwierzytelnianie: Sanctum (SPA) i logowanie przez Discord (Socialite)

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: rejestracja klasycznie przez e-mail oraz przez Discord. Frontend jest aplikacją SPA. W historyjce US-01 przyjęto, że token nie jest przechowywany w przeglądarce.

## Decyzja

- Logowanie e-mailem i hasłem, sesja oparta na ciasteczku (Laravel Sanctum w trybie SPA).
- Logowanie przez Discord realizuje Laravel Socialite. Jeśli konto nie istnieje, jest zakładane automatycznie z nazwą i avatarem z Discorda.
- Po 5 nieudanych próbach logowania w ciągu minuty logowanie jest chwilowo blokowane.
- Komunikaty walidacji backendu są po polsku.

## Konsekwencje

### Pozytywne

- Token nie jest dostępny dla skryptów w przeglądarce.
- Logowanie przez Discord nie wymaga osobnego hasła.

### Negatywne

- Sanctum w trybie SPA wymaga skonfigurowania domen frontendu i CORS; frontend i backend muszą działać na zgodnych domenach.
- Logowanie przez Discord ma priorytet Should (US-02) i może zostać odłożone, jeśli zabraknie czasu.

## Powiązane dokumenty

- [Backlog: US-01, US-02](../lab/docs/02-planowanie/backlog-management.md)
