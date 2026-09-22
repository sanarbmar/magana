# Direction contract — Magna Comunicaciones redesign

Locked with Santiago on 2026-09-21. This is a development-only contract; it does not ship in any page source.

## THESIS
The site should feel like stepping into Magna's own 2024 Informe de Gestión brought to life on the web: real 18-year achievements presented with editorial authority and organic brand warmth. It refuses the generic "corporate agency" template — soft blue gradients, stock handshake photos, rounded SaaS cards — that every competing comms agency site defaults to.

## OWN-WORLD
- **Color strategy: Full palette (4 named roles), sampled with a color picker directly off the real PDF pages, not guessed:**
  - `--magna-core: #FF6633` (the logo/"M" mark — brand identity, primary CTA, links)
  - `--magna-empresas: #FFAB00` (the report cover's own amber field — Empresas vertical)
  - `--magna-gobiernos: #0090D2` (the report's blue section field — Gobiernos vertical)
  - `--magna-personas: #FF406E` (the report's pink/magenta section field — Personas/Magna SEI vertical)
  - Ink: near-black `#141414`; ground: warm off-white `#FBF9F6`, never a generic light-gray SaaS background.
  - This maps Magna's own real, already-in-use report palette onto the three audience segments — real brand system, not invented, and it doubles as wayfinding (a visitor always knows which vertical they're in by its color field).
- **Motif:** the report's own organic wave/blob fields with a thin hand-drawn outline stroke, white dot-pattern scatter, concentric circle rings, and white line-art botanical illustration — traced from the actual PDF pages in `.impeccable/reference-scans/`. Never generic geometric confetti or blob-morph SVGs.
- **Type:** Archivo (Black/Expanded for display headlines — bold, geometric, editorial, matches the report's own bold sans headings) paired with Public Sans for body copy (the U.S. federal government's own typeface — real provenance, quietly reinforces the Gobiernos credibility without being literal). No serif; no Fraunces/Playfair/Space Grotesk/Inter-as-display defaults.
- **Data presentation:** stats and proof read like annual-report spreads — big committed numbers, colored rules matching the relevant vertical, grid structure — not generic icon-plus-number "feature cards".

## STORY
A visitor lands and immediately understands: Magna is an established, credentialed, 18-year agency (not a startup), with real proof (named clients, real numbers, the CEO's own words). They self-segment fast into Empresas / Gobiernos / Personas, and every path ends at a clear, low-friction way to contact Magna.

## FIRST VIEWPORT (homepage)
Full-bleed orange organic gradient field (echo of the Informe cover), bold editorial headline stating Magna's positioning in one line, a real proof number immediately visible (18 años · 500+ líderes · 51+ gobiernos), one primary CTA (Conversemos), and a way to jump straight to the visitor's segment (Empresas / Gobiernos / Personas). No stock photography in the hero — the opening move is typographic + the organic motif, photography arrives as evidence further down.

## FORM
Direction chosen manually (Impeccable's network roll service was unreachable in this sandbox, so the challenger/comp round ran degraded — disclosed to Santiago). Selected from 3 hand-built candidate directions grounded in Magna's real world: **"Informe de Gestión editorial system"**, chosen over "Gaceta oficial + sala de control" and "Escenario de conferencia".

## FINISH
Unreviewed and undocumented is unfinished; this build ends with a finish review (desktop + mobile screenshots, `impeccable detect` anti-pattern scan, fixes batched once, confirmed with at most one more round) and a short DESIGN.md documenting the shipped system. Every image used is real Magna content — no illustrative/synthetic placeholders are expected given PRODUCT.md confirms all current content and images are real and reusable.

## Build order
Homepage (`index.html`) first as the flagship, shown to Santiago for a checkpoint before propagating the shared system (tokens, header, footer, component language) across the other 7 pages — deliberately avoiding a repeat of the earlier Astro attempt, which was only reviewed once fully built.
