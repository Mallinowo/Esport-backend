# Retrospektywa Sprintu 1 (20.10 – 02.11.2026)

## Liczby

Zaplanowane było 43 SP: frontend 22 SP (Kuba 12, Wojtek 10) i backend 21 SP (Michał 9, Kyrylo 12).

| Obszar | Zaplanowane | Zamknięte | Zostało |
|---|---|---|---|
| Frontend Kuba | 12 SP | 10 SP (TextField, Select, Spinner, API client) | 2 SP (Checkbox i Switch, PR #38 otwarty) |
| Frontend Wojtek | 10 SP | 5 SP (LiveIndicator, Skeleton, EmptyState, Card) | 5 SP (ESLint, Badge, Avatar i TeamLogo) |
| Backend Michał | 9 SP | 3 SP (rejestracja, logowanie, wylogowanie) | 6 SP (komunikaty walidacji, role, seedery) |
| Backend Kyrylo | 12 SP | 0 SP | 12 SP (Sanctum, schemat bazy, Scramble, CI) |
| Razem | 43 SP | 18 SP | 25 SP |

Do tego Kuba zrobił mocki MSW (5 SP) z Sprintu 2, więc razem wyszło 23 SP. Jedenaście niezamkniętych issues przenosimy do Sprintu 2.

## Co poszło dobrze

- Komponenty wchodziły na main małymi PR-ami z "Closes #N", dzięki temu tablica aktualizowała się sama.
- Klient API i mocki MSW sprawiły, że frontend nie czeka na backend.
- Wojtek zamknął cztery issues i poprawił je po review (tokeny, nazwa pliku spec, etykiety).
- Kuba zrobił swoje zadania i jeszcze MSW z następnego sprintu.

## Co nie poszło

- Backend zamknął tylko 3 z 21 SP. Kyrylo ma branch `feature/teams-api` z 15.10, ale nie ma z niego PR-a.
- Wojtek zrobił połowę swoich punktów. ESLint, Badge i Avatar zostały na Sprint 2.
- Checkbox i Switch zostały otwarte, bo robiliśmy je na końcu sprintu, małymi commitami.
- Większość zamknięć jest z 18-20.10, potem była przerwa.

## Dlaczego

- Sprint wypadł na początek semestru i mieliśmy też zadania z innych przedmiotów, więc mało czasu na projekt.
- Zaplanowaliśmy tyle samo pracy każdej osobie, nie patrząc, ile kto ma czasu. Najwięcej punktów dostał backend.

## Co zmieniamy w Sprincie 2

1. Każda praca idzie przez issue i PR z "Closes #N", PR od razu jako draft.
2. Kyrylo robi PR z `feature/teams-api` w pierwszym tygodniu.
3. Wojtek zaczyna od ESLint i Prettier, bo to przeformatuje całe repo.
4. Backend najpierw domyka zaległości, dopiero potem nowe endpointy.
5. Przed startem sprintu każdy mówi, ile ma czasu, i według tego dzielimy zadania. W połowie sprintu (9.11) przeglądamy tablicę.
6. Generator ligi i logowanie przez Discord przesuwamy do Sprintu 3.
