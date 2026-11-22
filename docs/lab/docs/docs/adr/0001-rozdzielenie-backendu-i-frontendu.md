# ADR-0001: Rozdzielenie backendu i frontendu, komunikacja przez REST API

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Wymaganie projektu: backend i frontend mają być odseparowane, a komunikacja ma odbywać się przez REST API. Zespół jest podzielony na część backendową (Michał Kuchar, Kyrylo Shchedrin) i frontendową (Wojciech Kasprzyk, Jakub Maliński), więc obie części muszą powstawać równolegle.

## Decyzja

Backend (REST API) i frontend (aplikacja webowa) są osobnymi repozytoriami: `Esport-backend` i `Esport-frontend`. Frontend komunikuje się z backendem wyłącznie przez REST API oraz WebSocket (patrz ADR-0009). Dokumentacja projektu znajduje się w repozytorium backendu (`docs/`).

## Konsekwencje

### Pozytywne

- Obie części mogą być rozwijane równolegle i niezależnie.
- Frontend może pracować na mockach (ADR-0010), zanim backend jest gotowy.

### Negatywne

- Trzeba utrzymywać kontrakt API między dwoma repozytoriami.
- Uwierzytelnianie na ciasteczkach wymaga zgodnej konfiguracji domen i CORS (ADR-0004).

## Powiązane dokumenty

- [Analiza wymagań](../lab/docs/01-start-projektu/analiza-wymagań.md)
- [Podział ról](../lab/docs/02-planowanie/podzial-rol.md)
