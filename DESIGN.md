# Design system — Magna Comunicaciones (2026 rediseño)

Shipped: 2026-09-21. Built with the "Informe de Gestión editorial system" direction (see `DIRECTION.md`). Status: **homepage (`index.html`) complete and delivered**; other 7 pages not yet started — checkpoint with Santiago before propagating.

## What shipped

- `css/magna.css` — the full design system: tokens, type scale, buttons, nav, organic "field" color bands, stat blocks, three-fronts layout, marquee, FAQ, footer, scroll-reveal. Single stylesheet, no build step, no framework.
- `index.html` — rebuilt from scratch on this system. Structure: sticky nav → hero (amber field, real stat row, segment pills) → "Poder Magna" text ticker → three full-bleed vertical bands (Empresas amber / Gobiernos deep blue / Personas deep magenta, each with its own real stats and CTA) → proof section (ink field: 18-year stats, two real team photos, client-logo marquee) → FAQ (native `<details>`, real content) → final CTA → footer.
- All copy, stats, client logos, and photography are real, pulled from the current site and `PRODUCT.md` — nothing invented or placeholder.

## Palette

Sampled directly from Magna's own 2024 Informe de Gestión PDF (see `.impeccable/reference-scans/`), not guessed:
- Core `#FF6633` — brand/logo accent, links.
- Button fill `#C94317` (darkened from core; passes 4.9:1 contrast with white text — core itself only hit 2.9:1).
- Empresas `#FFAB00` (report cover amber).
- Gobiernos `#005E8A` (deep report blue — the brighter `#0090D2` is kept as an accent reference, but the deep tone is used as the section fill so white text clears WCAG AA).
- Personas `#B8123C` (deep report magenta, same reasoning).
- Ink `#141414` / ground `#FBF9F6`.

## Type

Archivo (800/900) for display, Public Sans for body — both via Google Fonts (works on the live site; blocked only inside this sandbox's own preview, unrelated to the shipped code).

## QA performed

- Rendered with Playwright (Chromium) inside this session at desktop (1440px) and mobile (390px) widths, full-page and scrolled-section screenshots, to visually verify layout, contrast, and the mobile nav drawer.
- Ran Impeccable's offline anti-pattern detector (`impeccable detect`) twice. First pass: 25 findings (mostly WCAG contrast failures from the sampled colors being too bright for direct white text, plus a heading-color bug on the dark section, a skipped heading level in the footer, and the marquee's continuous motion). Fixed: button color, section fill colors, a global `.field h1-h4 { color: inherit }` bug fix, footer column headers changed from `<h4>` to non-heading paragraphs, marquee pause-on-hover/focus + edge fade masks. Second pass: 3 remaining — one hover-color pairing that doesn't actually occur in the markup (false positive), the marquee's edge-to-edge layout (intentional, inherent to a ticker), and the continuous marquee motion itself (kept deliberately as part of the direction's "Poder Magna" ticker and client-logo marquee, both now pausable on hover/focus and disabled under `prefers-reduced-motion`).

## Known open items (unchanged from `PRODUCT.md`, not part of this pass)

- `og:image` (1200×630 social preview) is still a broken reference — needs a real designed asset.
- GA4 measurement ID is still a placeholder (`G-XXXXXXXXXX`).
- The `/movil` legacy redirect hasn't been addressed — the new homepage is fully responsive, so it should probably retire, but that's Santiago's call.
- The other 7 pages (empresas, gobiernos, personas, servicios, somos, magna-sei, conversemos, navidad) still use the old visual system — next step once this homepage is approved.
