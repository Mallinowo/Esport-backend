# Esports leagues and tournaments platform

A team project built at Collegium Witelona (computer science, semester 5) for the following courses:

- Projektowanie i programowanie systemów internetowych II (PPSI2)
- Projektowanie interfejsów graficznych (PIG)
- Wprowadzenie do zarządzania projektami deweloperskimi (WDZPD)

## About

The application lets organizers run round-robin leagues and knockout tournaments for selected games. Users sign up by email or with Discord, create teams and register them for competitions. Team captains report match results, which are confirmed by the opposing captain or by a competition administrator. The schedule and the bracket are generated on the server, and the league table, the bracket and the results update live.

Roles: user, captain, organizer, administrator.

## Team

| Name | Role |
|---|---|
| Jakub Maliński | project lead, project manager, frontend |
| Wojciech Kasprzyk | frontend |
| Michał Kuchar | backend, tester |
| Kyrylo Shchedrin | backend, devops |

## Interface design

Figma (comments enabled): https://www.figma.com/design/CGoSyApn2FSrY2Xm8pGTCH/Esport-Platform---Design-System?node-id=0-1

## Tech stack

| Area | Technologies |
|---|---|
| Frontend | Vue 3, TypeScript, Vite, Tailwind CSS, Pinia, Vue Router |
| Component library | Storybook |
| Backend | Laravel (REST API), Sanctum, Socialite (Discord), Reverb, Scramble (OpenAPI), Spatie Activitylog |
| Database | PostgreSQL |
| Testing | Vitest, Playwright, PHPUnit |
| Infrastructure | Docker Compose, GitHub Actions |

## Repositories

| Repository | Contents |
|---|---|
| [Esport-frontend](https://github.com/Mallinowo/Esport-frontend) | Vue application and Storybook component library |
| [Esport-backend](https://github.com/Mallinowo/Esport-backend) | Laravel REST API, OpenAPI specification, Docker Compose, project documentation (`docs`) |

The frontend and the backend communicate only through the REST API and WebSocket. The API types and client in the frontend are generated from the OpenAPI specification produced by the backend.

## Running locally

Setup instructions are in the README of each repository: [backend](../README.md) first, then [frontend](https://github.com/Mallinowo/Esport-frontend#readme).

## Documentation

Team members and university groups: [GROUP.md](GROUP.md). Course materials and templates: [lab](lab).

Product, technical, user and API documentation lives in the [zaliczenie](zaliczenie) directory and is published as a static site: LINK_DO_DOKUMENTACJI

## Deployment

Application: LINK_DO_APLIKACJI
