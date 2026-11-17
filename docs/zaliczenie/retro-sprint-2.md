# Retrospektywa Sprintu 2 (03.11 - 16.11.2026)

## Liczby

Po przeniesieniu zaległości ze Sprintu 1 plan miał 53 SP: frontend 26 SP, backend 27 SP. Zamknęliśmy 10 SP, wszystkie na froncie: Checkbox i Switch, Alert, Tabs i Modal. Backend nie zamknął żadnego issue.

Checkbox i Alert weszły na main jeszcze 2.11, a Tabs i Modal dopiero 17.11, dzień po końcu sprintu. Przez samo 2 tygodnie sprintu na main nie weszło praktycznie nic.

Do Sprintu 3 przechodzi 17 issue (43 SP) i 4 otwarte PR-y.

## Co poszło dobrze

- Review PR-ów było szybko: ESLint, Badge i Avatar dostały uwagi następnego dnia po otwarciu.
- Tabs i Modal są skończone razem z testami i stories, więc biblioteka komponentów ma już większość bazowych rzeczy.
- Mamy milestone'y dla każdego sprintu, więc postęp widać od razu w repo.
- Przygotowaliśmy event storming, backlog z historyjkami i estymację na zajęcia.

## Co nie poszło

- Cztery PR-y (ESLint, Badge, Avatar, Sanctum) dostały uwagi z review na początku listopada i od tego czasu nic się w nich nie zmieniło. Praca była prawie zrobiona, a nie weszła do sprintu.
- Backend drugi sprint z rzędu nie zamknął nic. Bez schematu bazy i Sanctum nie da się zacząć endpointów.
- Zadania kończyliśmy na ostatnią chwilę albo po terminie.
- Plan był za duży: 53 SP przy 23 SP zrobionych w Sprincie 1.

## Dlaczego

- Nikt nie pilnował PR-ów po review. Uwagi zostawały w komentarzach i nikt o nich nie przypominał.
- Zaległości ze Sprintu 1 przenieśliśmy w całości i jeszcze dołożyliśmy nowe zadania, zamiast zmniejszyć plan.
- Na backendzie zadania zależą od siebie (Sanctum, schemat, seedery), więc jedno zablokowane zadanie blokuje resztę.

## Co zmieniamy w Sprincie 3

1. Poprawki po review robimy w ciągu 2 dni. Jak ktoś nie da rady, pisze na Discordzie.
2. Najpierw kończymy otwarte PR-y, dopiero potem bierzemy nowe zadanie.
3. Planujemy tyle, ile realnie zrobiliśmy, a nie według pierwotnego planu. W Sprincie 3 nie dokładamy backendowi nic nowego, dopóki nie zamknie zaległości.
4. Kuba co kilka dni przegląda tablicę i pinguje osoby, którym coś wisi.
5. Backend zaczyna od PR-a z Sanctum i schematu bazy, bo od nich zależy reszta.
