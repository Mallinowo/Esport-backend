# ADR-0005: Role użytkowników i uprawnienia

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Event storming wyodrębnił aktorów: gość, użytkownik, kapitan, organizator i administrator. Różne akcje (tworzenie rozgrywek, zgłaszanie wyniku, rozstrzyganie sporów, nadawanie ról) wymagają różnych uprawnień.

## Decyzja

Role w systemie: użytkownik, kapitan, organizator, administrator.
- Rola kapitana wynika z bycia kapitanem drużyny; twórca drużyny zostaje jej kapitanem.
- Rolę organizatora nadaje i odbiera administrator.
- Uprawnienia są sprawdzane po stronie backendu; ukrywanie przycisków na froncie jest tylko wygodą dla użytkownika.

## Konsekwencje

### Pozytywne

- Rola kapitana nie jest osobnym, ręcznie utrzymywanym stanem, więc jest mniej danych do synchronizowania.
- Jasny podział, kto może tworzyć rozgrywki, zgłaszać wyniki i rozstrzygać spory.

### Negatywne

- Zmiany składu i kapitana wpływają na uprawnienia (kwestia otwarta: zmiana składu w trakcie rozgrywek).
- Sytuacja, gdy organizator gra we własnych rozgrywkach, wymaga osobnej reguły (kwestia otwarta).

## Powiązane dokumenty

- [Event storming](../lab/docs/02-planowanie/event-storming.md)
- [Backlog: US-19](../lab/docs/02-planowanie/backlog-management.md)
