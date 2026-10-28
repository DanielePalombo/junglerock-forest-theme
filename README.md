# Jungle Rock — tema Foresta

Tema a blocchi (Full Site Editing) del sito della A.S.D. Jungle Rock: crema, oliva e viola, foto in parallasse e contenuti che entrano allo scorrimento.
Si aggiorna da wp-admin tramite [Git Updater](https://git-updater.com), che legge questo repository.

## Struttura

- `theme.json`: colori, font (inclusi in `assets/fonts`, niente Google Fonts), spaziature
- `templates/`, `parts/`: template a blocchi
- `patterns/`: le parti che usano immagini del tema (logo, foto della home), perché un template `.html` non può calcolare l'indirizzo del tema
- `assets/css/theme.css`: stile di base; `assets/css/motion.css` e `assets/js/motion.js`: parallasse e comparsa allo scorrimento

## Anteprima in locale

Il progetto `junglerock-wp` (Docker) monta questa cartella come tema `junglerock-forest-theme`:
http://localhost:8088/?tema=junglerock-forest-theme

## Pubblicare una nuova versione

1. Aumenta `Version` in `style.css` (es. `1.0.0` → `1.0.1`).
2. Commit e push su `main`.
3. Crea il tag con lo **stesso numero**, senza `v`:
   ```bash
   git tag 1.0.1 && git push origin 1.0.1
   ```
4. L'action controlla che versione e tag coincidano e crea la release con `junglerock-forest-theme.zip`.
5. In wp-admin compare "Aggiornamento disponibile" per il tema (Git Updater controlla periodicamente; si può forzare da Impostazioni → Git Updater → "Aggiorna cache").

Se versione e tag non coincidono, Git Updater continua a proporre lo stesso aggiornamento all'infinito: l'action blocca la release in quel caso.
