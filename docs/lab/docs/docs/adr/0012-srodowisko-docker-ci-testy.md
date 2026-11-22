# ADR-0012: Środowisko: Docker Compose, GitHub Actions i testy

- **Status:** Przyjęta
- **Data:** 2026-11-22
- **Decydenci:** zespół projektowy (Jakub Maliński, Wojciech Kasprzyk, Michał Kuchar, Kyrylo Shchedrin)

## Kontekst

Zespół pracuje na różnych maszynach, a projekt ma być łatwy do uruchomienia przez każdego członka zespołu.

## Decyzja

- Lokalne środowisko backendu jest uruchamiane przez Docker Compose (wymagane są tylko Docker i Docker Compose).
- Testy backendu: PHPUnit (`php artisan test`).
- CI w GitHub Actions uruchamia testy na PostgreSQL.
- Frontend: Vue 3, TypeScript, Vite, Tailwind CSS, Pinia i Vue Router; testy jednostkowe w Vitest; Node.js 22.12 lub nowszy.

## Konsekwencje

### Pozytywne

- Powtarzalne środowisko i szybki start nowego członka zespołu.

### Negatywne

- Wymaga znajomości Dockera w zespole.

## Powiązane dokumenty

- [Narzędzia PM](../lab/docs/03-realizacja/narzedzia-pm.md)
- [Praca w sprintach](../lab/docs/03-realizacja/praca-w-sprintach.md)
