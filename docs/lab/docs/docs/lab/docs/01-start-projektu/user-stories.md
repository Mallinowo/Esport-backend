# User Stories

Historyjki użytkownika platformy do prowadzenia lig i turniejów e-sportowych. Powstały z event stormingu, ekranów z Figmy i ustaleń między frontendem a backendem. Każda historyjka ma priorytet (MoSCoW), punkty (SP), kryteria akceptacji i zadania (issue z GitHuba), które się na nią składają.

- Priorytety: **Must** (musi być na zaliczenie), **Should** (robimy potem), **Could** (jeśli zostanie czas).
- Numery z `#` to issue, które już są na GitHubie. Zadania z oznaczeniem „(nowe*)” zostaną założone na początku sprintu, a ich punkty są wstępne.
- Stan na 10.11.2026.

Zobacz też: [Backlog](../02-planowanie/backlog-management.md) · [Estymacja](../02-planowanie/estymacja.md) · [Event storming](../02-planowanie/event-storming.md) · [Persony](definiowanie-person.md)

## E1. Konto i dostęp

### US-01: Rejestracja i logowanie e-mailem

**Priorytet:** Must · **Punkty:** 12 SP · **Status:** w trakcie

> Jako gość chcę założyć konto i logować się adresem e-mail i hasłem, aby zgłaszać wyniki swojej drużyny i obserwować rozgrywki.

**Kryteria akceptacji:**

- Formularz rejestracji ma pola: nazwa, e-mail, hasło i powtórzenie hasła; po rejestracji użytkownik jest od razu zalogowany.
- Logowanie ma opcję „Zapamiętaj mnie”.
- Błędne hasło pokazuje komunikat pod polem; po 5 nieudanych próbach w minucie logowanie jest chwilowo zablokowane.
- Komunikaty walidacji są po polsku i wyświetlają się pod właściwym polem.
- Sesja działa na ciasteczku (Sanctum SPA), token nie jest trzymany w przeglądarce.
- Wylogowanie kończy sesję i przenosi na listę rozgrywek.

**Zadania:** Backend: #5 Add register, login and logout endpoints; #1 Configure Sanctum SPA auth; #6 Add Polish validation messages. Frontend: Add login and register pages (nowe*).

### US-02: Logowanie przez Discord

**Priorytet:** Should · **Punkty:** 5 SP · **Status:** do zrobienia

> Jako gracz chcę zalogować się kontem Discord, aby nie zakładać osobnego hasła i mieć od razu avatar z Discorda.

**Kryteria akceptacji:**

- Przycisk „Zaloguj przez Discord” przenosi do Discorda i z powrotem do aplikacji.
- Jeśli konta jeszcze nie ma, zakłada się automatycznie z nazwą i avatarem z Discorda.
- Przy błędzie lub anulowaniu użytkownik wraca na stronę logowania z komunikatem.

**Zadania:** Backend: Add Discord login. Frontend: Add Discord login button and callback page (nowe*).

## E2. Drużyny

### US-03: Utworzenie drużyny

**Priorytet:** Must · **Punkty:** 8 SP · **Status:** do zrobienia

> Jako zalogowany użytkownik chcę utworzyć drużynę z nazwą, skrótem i logo, aby zapisać ją do rozgrywek.

**Kryteria akceptacji:**

- Nazwa drużyny jest unikalna, skrót ma 2-5 znaków.
- Logo jest opcjonalne; bez logo wyświetlają się inicjały ze skrótu.
- Twórca drużyny zostaje jej kapitanem i dostaje rolę kapitana.
- Strona drużyny pokazuje skład i rozgrywki, w których drużyna gra.

**Zadania:** Backend: Add team create and members endpoints (nowe*). Frontend: Add team page and create team form (nowe*). Część backendu jest na branchu feature/teams-api (tabele teams, team_users, TeamController).

### US-04: Zapraszanie zawodników do drużyny

**Priorytet:** Must · **Punkty:** 6 SP · **Status:** do zrobienia

> Jako kapitan chcę zaprosić zawodników do swojej drużyny, aby skompletować skład przed zapisami.

**Kryteria akceptacji:**

- Kapitan wysyła zaproszenie po nazwie użytkownika.
- Zaproszony widzi listę zaproszeń i może je przyjąć albo odrzucić.
- Po przyjęciu zawodnik pojawia się w składzie drużyny.
- Nie można zaprosić kogoś, kto już jest w drużynie.

**Zadania:** Backend: Add team invitations endpoints (nowe*). Frontend: Add invitations list and invite form (nowe*).

## E3. Organizacja rozgrywek

### US-05: Tworzenie rozgrywek

**Priorytet:** Must · **Punkty:** 8 SP · **Status:** do zrobienia

> Jako organizator chcę utworzyć ligę albo puchar dla wybranej gry, aby przeprowadzić rozgrywki na platformie zamiast w arkuszu.

**Kryteria akceptacji:**

- Formularz: gra, nazwa, format (liga/puchar), minimalna i maksymalna liczba drużyn, koniec zapisów, start, zasady (punkty za wygraną, remis, porażkę, kolejność tie-breakerów).
- Rozgrywki zapisują się jako szkic widoczny tylko dla organizatora.
- Organizator otwiera zapisy, wtedy rozgrywki pojawiają się na liście ze statusem „Zapisy”.
- Przycisk „Utwórz rozgrywki” widzi tylko organizator i administrator.

**Zadania:** Backend: Add create and edit competition endpoints (nowe*). Frontend: Add create competition form (nowe*).

### US-06: Zapis drużyny do rozgrywek

**Priorytet:** Must · **Punkty:** 5 SP · **Status:** do zrobienia

> Jako kapitan chcę zapisać swoją drużynę do rozgrywek w trakcie zapisów, aby wziąć udział w lidze lub pucharze.

**Kryteria akceptacji:**

- Przycisk „Zapisz drużynę” jest widoczny tylko dla kapitana i tylko przy statusie „Zapisy”.
- Nie można zapisać drużyny, gdy limit drużyn jest pełny albo zapisy się skończyły.
- Licznik drużyn na karcie rozgrywek (np. 12 / 16) od razu się zmienia.

**Zadania:** Backend: Add competition registration endpoint (nowe*). Frontend: Add sign up team button on competition page (nowe*).

### US-07: Automatyczny terminarz ligi

**Priorytet:** Must · **Punkty:** 5 SP · **Status:** do zrobienia

> Jako organizator chcę, żeby po zamknięciu zapisów terminarz ligi wygenerował się sam, aby nie układać par i kolejek ręcznie.

**Kryteria akceptacji:**

- Każda drużyna gra z każdą raz (system kołowy).
- Przy nieparzystej liczbie drużyn w każdej kolejce jedna drużyna pauzuje.
- Kolejki dostają daty od dnia startu rozgrywek.
- Po wygenerowaniu rozgrywki przechodzą w status „W trakcie”.
- Przykład: 5 drużyn i koniec zapisów daje 5 kolejek po 2 mecze, każda drużyna pauzuje raz, a żadna nie gra dwa razy w jednej kolejce.

**Zadania:** Backend: Add league schedule generator.

### US-08: Automatyczna drabinka pucharu

**Priorytet:** Must · **Punkty:** 5 SP · **Status:** do zrobienia

> Jako organizator chcę, żeby po zamknięciu zapisów drabinka pucharu wygenerowała się sama, aby nie losować par ręcznie.

**Kryteria akceptacji:**

- Pary są losowane, rundy mają nazwy od 1/8 do finału.
- Gdy liczba drużyn nie jest potęgą dwójki, najwyżej rozstawione drużyny dostają wolny los i od razu przechodzą dalej.
- Każdy mecz wie, do którego meczu przechodzi zwycięzca.

**Zadania:** Backend: Add cup bracket generator.

## E4. Przeglądanie rozgrywek

### US-09: Lista rozgrywek z filtrami

**Priorytet:** Must · **Punkty:** 11 SP · **Status:** w trakcie

> Jako kibic chcę przeglądać ligi i turnieje z filtrami po grze, formacie i statusie, aby szybko znaleźć rozgrywki, które mnie interesują.

**Kryteria akceptacji:**

- Lista działa bez logowania.
- Filtry: gra, format (liga, puchar), status; na telefonie jako chipy, na desktopie jako panel boczny.
- Karta pokazuje logo gry, nazwę, status, format, liczbę drużyn i termin zapisów.
- Lista jest stronicowana po 12 pozycji.
- Stany: ładowanie (szkielety kart), pusty („Brak rozgrywek dla wybranych filtrów” + „Wyczyść filtry”), błąd z „Spróbuj ponownie”.

**Zadania:** Backend: #10 Add games and competitions list endpoints. Frontend: #43 Add CompetitionCard component; Add competitions list page.

### US-10: Strona ligi i obserwowanie

**Priorytet:** Must · **Punkty:** 11 SP · **Status:** w trakcie

> Jako kibic chcę zobaczyć szczegóły ligi, listę drużyn i zasady oraz obserwować ligę, aby mieć wszystkie informacje o lidze w jednym miejscu.

**Kryteria akceptacji:**

- Nagłówek: nazwa, gra, status, przycisk „Obserwuj”.
- Zakładki: Tabela, Terminarz, Drużyny, Zasady.
- Obserwowanie wymaga logowania; gość po kliknięciu trafia do logowania.
- Na szerokości 360 px nie ma poziomego przewijania strony.

**Zadania:** Backend: #11 Add competition details, teams and follow endpoints. Frontend: Add league page with table and schedule.

### US-11: Tabela ligi

**Priorytet:** Must · **Punkty:** 10 SP · **Status:** do zrobienia

> Jako kibic chcę widzieć aktualną tabelę ligi z formą drużyn, aby wiedzieć, kto prowadzi i jak idzie mojej drużynie.

**Kryteria akceptacji:**

- Tabela liczy się tylko z zakończonych meczów.
- Punkty i kolejność tie-breakerów są brane z zasad ligi.
- Forma pokazuje 5 ostatnich meczów jako W/R/P.
- Obserwowana drużyna jest podświetlona.
- Telefon: wersja skrócona (miejsce, drużyna, M, Pkt, forma); desktop: pełna (M, W, R, P, bilans, Pkt, forma).
- Przed wygenerowaniem terminarza: „Terminarz pojawi się po zamknięciu zapisów”.
- Przykład: liga daje 1 punkt za remis, mecz kończy się 1:1, więc obie drużyny dostają po 1 punkcie, a w formie pojawia się R.

**Zadania:** Backend: Add standings calculation and endpoint. Frontend: Add StandingsTable component.

### US-12: Terminarz i wyniki meczów

**Priorytet:** Must · **Punkty:** 5 SP · **Status:** w trakcie

> Jako kibic chcę przeglądać terminarz ligi po kolejkach z wynikami, aby wiedzieć, kiedy gra moja drużyna.

**Kryteria akceptacji:**

- Mecze są pogrupowane po kolejkach i posortowane po dacie.
- Każdy mecz ma status: zaplanowany, na żywo, oczekuje na potwierdzenie, sporny, zakończony.
- Daty są w czasie lokalnym użytkownika.

**Zadania:** Backend: Add schedule endpoint. Frontend: #44 Add MatchRow component.

### US-13: Podgląd drabinki pucharu

**Priorytet:** Must · **Punkty:** 11 SP · **Status:** do zrobienia

> Jako kibic chcę śledzić drabinkę pucharu runda po rundzie, aby widzieć, kto przeszedł dalej i kto wygrał turniej.

**Kryteria akceptacji:**

- Desktop: kolumny rund połączone liniami.
- Telefon: zakładki z rundami i pionowa lista meczów, bez poziomego przewijania strony.
- Zwycięzca meczu jest pogrubiony, mistrz pokazany w karcie na końcu drabinki.
- Przed wygenerowaniem: „Drabinka zostanie wygenerowana po zamknięciu zapisów” z datą.

**Zadania:** Backend: Add bracket endpoint. Frontend: Add BracketMatch component; Add cup bracket page.

## E5. Wyniki meczów

### US-14: Mecze do rozliczenia

**Priorytet:** Should · **Punkty:** 3 SP · **Status:** do zrobienia

> Jako kapitan chcę widzieć listę meczów mojej drużyny, które czekają na mój wynik albo potwierdzenie, aby nie przegapić żadnego meczu do rozliczenia.

**Kryteria akceptacji:**

- Lista pokazuje tylko mecze, w których kapitan ma coś do zrobienia.
- Szczegóły meczu pokazują historię zgłoszeń od najnowszego.
- Pusty stan: „Brak meczów do rozliczenia”.

**Zadania:** Backend: Add match details and my matches endpoints.

### US-15: Zgłoszenie i potwierdzenie wyniku

**Priorytet:** Must · **Punkty:** 13 SP · **Status:** do zrobienia

> Jako kapitan chcę zgłosić wynik meczu, który potwierdza kapitan rywali, aby wynik trafił do tabeli lub drabinki bez udziału organizatora.

**Kryteria akceptacji:**

- Wynik zgłasza tylko kapitan jednej z drużyn meczu; wynik 0-99, opcjonalnie mapa, komentarz i zrzut ekranu (PNG, JPG, WEBP do 5 MB).
- Przed wysłaniem pojawia się okno potwierdzenia, zgłoszonego wyniku nie da się edytować.
- Drugie zgłoszenie do tego samego meczu jest odrzucane z komunikatem.
- Kapitan rywali widzi „Drużyna X zgłosiła wynik 2:1” z przyciskami „Potwierdź” i „Zgłoś spór”.
- Po potwierdzeniu mecz jest zakończony, tabela się przelicza, a w pucharze zwycięzca przechodzi do kolejnej rundy.
- W pucharze remis jest niedozwolony i pokazuje błąd przy polu wyniku.
- Przykład: kapitan Nocnej Zmiany zgłasza 2:0 z Szybkimi Graczami, kapitan Szybkich Graczy klika „Potwierdź”, więc mecz ma status „zakończony”, a tabela ligi uwzględnia wynik.

**Zadania:** Backend: Add result report and confirm endpoints. Frontend: Add match result report page.

### US-16: Spór o wynik

**Priorytet:** Should · **Punkty:** 10 SP · **Status:** do zrobienia

> Jako kapitan chcę zgłosić spór, gdy rywale podali zły wynik, aby organizator mógł to sprawdzić, zanim wynik wejdzie do tabeli.

**Kryteria akceptacji:**

- Spór może zgłosić tylko kapitan rywali, póki wynik czeka na potwierdzenie.
- Komentarz jest wymagany (10-1000 znaków), można dodać do 3 zrzutów ekranu.
- Mecz dostaje status „sporny” i nie wlicza się do tabeli.
- Pole plików obsługuje przeciąganie i sprawdza typ i rozmiar przed wysłaniem.

**Zadania:** Backend: Add dispute and resolve endpoints. Frontend: Add FileUpload component.

### US-17: Rozstrzygnięcie sporu

**Priorytet:** Should · **Punkty:** 3 SP · **Status:** do zrobienia

> Jako organizator chcę rozstrzygnąć spór i wpisać ostateczny wynik, aby rozgrywki mogły toczyć się dalej.

**Kryteria akceptacji:**

- Organizator widzi oba stanowiska: zgłoszenie z dowodami i spór z załącznikami.
- Wpisuje ostateczny wynik i wymagany komentarz.
- Po rozstrzygnięciu mecz jest zakończony, tabela i drabinka aktualizują się jak po potwierdzeniu.

**Zadania:** Frontend: Add dispute resolve view for organizer (nowe*). Endpoint rozstrzygnięcia jest w zadaniu z US-16 (Add dispute and resolve endpoints).

## E6. Wyniki na żywo

### US-18: Wyniki na żywo

**Priorytet:** Should · **Punkty:** 10 SP · **Status:** do zrobienia

> Jako kibic chcę widzieć zmiany wyników i tabeli bez odświeżania strony, aby śledzić rozgrywki na bieżąco.

**Kryteria akceptacji:**

- Zmiana wyniku meczu, tabeli albo drabinki pojawia się bez przeładowania strony.
- Zmieniony wiersz tabeli jest na chwilę podświetlony, pojawia się powiadomienie „Wynik zaktualizowany”.
- Mecze w trakcie mają znacznik „na żywo”.
- Po zerwaniu połączenia pokazuje się komunikat i dane odświeżają się co 15 s, aż połączenie wróci.

**Zadania:** Backend: Add live updates with Reverb. Frontend: Add live updates with Echo.

## E7. Administracja

### US-19: Zarządzanie rolami

**Priorytet:** Should · **Punkty:** 7 SP · **Status:** w trakcie

> Jako administrator chcę nadawać i odbierać rolę organizatora, aby kontrolować, kto może tworzyć rozgrywki.

**Kryteria akceptacji:**

- Role: użytkownik, kapitan, organizator, administrator; kapitan wynika z bycia kapitanem drużyny.
- Lista użytkowników z wyszukiwaniem i przełącznikiem roli organizatora.
- Strona administracji jest niedostępna dla innych ról.

**Zadania:** Backend: #7 Add user roles; Add admin endpoint for user roles (nowe*). Frontend: Add admin users page with roles (nowe*).

### US-20: Log aktywności

**Priorytet:** Could · **Punkty:** 7 SP · **Status:** do zrobienia

> Jako administrator chcę przeglądać log działań w systemie, aby wiedzieć, kto zgłosił, potwierdził albo zmienił wynik i kto zmieniał role.

**Kryteria akceptacji:**

- Log zapisuje zgłoszenia, potwierdzenia, spory, rozstrzygnięcia i zmiany ról z autorem i datą.
- Lista logów jest stronicowana i filtrowana po typie zdarzenia.

**Zadania:** Backend: Add activity log; Add activity log endpoint (nowe*). Frontend: Add activity log page for admin (nowe*).
