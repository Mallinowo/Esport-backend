# Architecture Decision Records (ADR)

Rejestr decyzji architektonicznych projektu **Platforma do prowadzenia lig i turniejów e-sportowych** (Esport-backend / Esport-frontend), Collegium Witelona.

Każda decyzja jest w osobnym pliku. Przyjęte ADR nie są edytowane: zmiana decyzji to nowy ADR, a stary dostaje status „Zastąpiona” (Superseded).

Wytyczne: [adr-guide.md](../lab/docs/04-dokumentacja/adr-guide.md)

## Spis decyzji

| Nr | Decyzja | Status |
|----|---------|--------|
| 0001 | [Rozdzielenie backendu i frontendu, komunikacja przez REST API](0001-rozdzielenie-backendu-i-frontendu.md) | Przyjęta |
| 0002 | [Laravel jako framework backendu](0002-laravel-jako-framework-backendu.md) | Przyjęta |
| 0003 | [PostgreSQL jako baza danych](0003-postgresql-jako-baza-danych.md) | Przyjęta |
| 0004 | [Uwierzytelnianie: Sanctum (SPA) i logowanie przez Discord (Socialite)](0004-uwierzytelnianie-sanctum-i-discord.md) | Przyjęta |
| 0005 | [Role użytkowników i uprawnienia](0005-role-uzytkownikow.md) | Przyjęta |
| 0006 | [Generowanie terminarza i drabinki po stronie serwera](0006-generowanie-terminarza-i-drabinki-na-backendzie.md) | Przyjęta |
| 0007 | [Zgłaszanie wyniku: potwierdzenie przez rywala i spór](0007-zglaszanie-wyniku-i-spor.md) | Przyjęta |
| 0008 | [Tabela i drabinka liczone z zakończonych meczów](0008-tabela-i-drabinka-z-zakonczonych-meczow.md) | Przyjęta |
| 0009 | [Wyniki na żywo: Laravel Reverb (WebSocket)](0009-wyniki-na-zywo-reverb.md) | Przyjęta |
| 0010 | [Dokumentacja OpenAPI (Scramble), wygenerowany klient i mocki MSW](0010-openapi-klient-i-mocki.md) | Przyjęta |
| 0011 | [Log aktywności: Spatie Activitylog](0011-log-aktywnosci-spatie.md) | Przyjęta |
| 0012 | [Środowisko: Docker Compose, GitHub Actions i testy](0012-srodowisko-docker-ci-testy.md) | Przyjęta |

## Otwarte kwestie (jeszcze bez decyzji)

1. Co zrobić, gdy zapisało się mniej drużyn niż minimum?
2. Czy drużyna może grać w kilku rozgrywkach naraz?
3. Czy można zmieniać skład drużyny w trakcie rozgrywek?
4. Kto i kiedy przełącza mecz na „na żywo”? (propozycja: o godzinie meczu)
5. Co zrobić, gdy rywal nie potwierdza wyniku? (na razie decyduje organizator)
6. Kto rozstrzyga spór, gdy organizator gra we własnych rozgrywkach?
7. Czy w lidze dopuszczamy remis? (w pucharze: nie)
