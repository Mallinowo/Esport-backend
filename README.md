# Esport Platform: backend

REST API platformy do prowadzenia lig i turniejów e-sportowych. Projekt zespołowy realizowany w Collegium Witelona.

Powiązane repozytoria:

- dokumentacja projektu i Figma: https://github.com/Mallinowo/esport-platform
- frontend: https://github.com/Mallinowo/Esport-frontend

## Zakres

- rejestracja i logowanie mailem oraz przez Discord
- drużyny, zaproszenia, role (użytkownik, kapitan, organizator, administrator)
- ligi (każdy z każdym) i turnieje pucharowe, zapisy drużyn
- generowanie terminarza i drabinki po stronie serwera
- zgłaszanie i akceptacja wyników, obsługa sporów
- tabela ligowa i bilans W/L aktualizowane automatycznie
- zmiany wyników na żywo przez WebSocket
- panel administracyjny i logi aplikacji

## Stos technologiczny

- Laravel (REST API)
- Sanctum, Socialite (Discord)
- Reverb (WebSocket)
- Scramble (dokumentacja OpenAPI)
- Spatie Activitylog
- PostgreSQL
- PHPUnit
- Docker Compose, GitHub Actions

## Uruchomienie lokalne

Wymagania: Docker i Docker Compose.

```bash
git clone https://github.com/Mallinowo/Esport-backend.git
cd Esport-backend
cp .env.example .env
docker compose up -d
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```

API jest dostępne pod adresem http://localhost:8000/api.

## Dokumentacja API

Specyfikacja OpenAPI generowana jest przez Scramble i dostępna pod adresem http://localhost:8000/docs/api. Frontend korzysta z niej do generowania typów i klienta API.

## Testy

```bash
docker compose exec app php artisan test
```

## Zespół

- Michał Kuchar: backend, tester
- Kyrylo Shchedrin: backend, devops
- Jakub Maliński: lider projektu
