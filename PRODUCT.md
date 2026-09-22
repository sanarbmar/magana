# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Stack

Static HTML/CSS/JS, hand-authored (no build step, no Node in production). Confirmed by the user: hosting is shared cPanel with FTP deploy, so the final artifact must always be plain static files editable and uploadable directly. An earlier attempt used Astro to generate static output; the user preferred hand-authored HTML going forward for this rebuild.

## Users

Three primary segments, all reached through the same institutional site:
- **Empresas**: corporate communications/marketing decision-makers evaluating a strategic-communication and events agency.
- **Gobiernos**: public-institution officials needing public communication, governance, citizen engagement, or crisis-communication support.
- **Personas**: individual executives/leaders seeking executive coaching and personal-brand development (the "Magna SEI" program).

Based in Medellín, Colombia; clients span Antioquia and the rest of Colombia.

## Product Purpose

The site is a credibility and lead-generation tool for a communications/events agency — a "carta de presentación" to win new clients and contracts, not a blog or content-marketing site. Every page should move a qualified visitor toward contacting Magna.

## Positioning

18 years of trayectoria (since ~2008) as a strategic-communication and events agency with three distinct, specialized fronts under one roof — corporate, government/public-sector, and individual leadership coaching — a combination most competing agencies do not offer together. Real client roster (EPM, Comfenalco, Emvarias, government entities, universities) is the core social proof.

## Operating Context

- CEO: Lilliana Sierra Martínez (per the 2024 Informe de Gestión).
- Contact channels in active use: WhatsApp (+57 323 313 1056), email (somos@magnacomunicaciones.com), Instagram, Facebook, LinkedIn, TikTok.
- A separate `/movil` version of the site currently exists (legacy mobile redirect); the redesign should be responsive instead of maintaining a parallel mobile site — to confirm with the user before removing the redirect.
- Real assets on hand: team photos, event photos, client logos, the 2024 Informe de Gestión PDF, a combined Política de Privacidad / Términos y Condiciones PDF.

## Capabilities and Constraints

- Must preserve existing page URLs and SEO exactly (18 years of positioning) — this was an explicit, firm constraint from the user earlier in this project.
- Static shared hosting only; all interactivity/animation must run client-side.
- Real images and existing content (stats, testimonials, client logos) are confirmed accurate by the user and may be reused as-is — they are not placeholder/filler.
- WCAG accessibility was part of the original brief and should be honored in the redesign.

## Brand Commitments

- Name: Magna Comunicaciones. Coaching sub-brand: Magna SEI.
- Existing mark: circular orange logo with a white "M" (source: `img/logo.svg`, orange ≈ `#EF5424`).
- Real, confirmed social handles and contact info listed above must carry over unchanged.

## Evidence on Hand

- Real stats surfaced from the current site's own copy (reuse verbatim, do not invent new ones): "120+ líderes exitosos" (coaching), "51+ gobiernos" / "95% efectividad" (public sector), "500+ líderes" fortalecidos, "18 años" de trayectoria.
- Real client logos: EPM, Comfenalco, Emvarias, Antioquia (departmental government), Gobierno de Colombia, EAFIT, ARVI, Consejo (exact list in `img/clientes/`).
- Real team photos in `img/fotosequipo/`.
- Real FAQ content (8 Q&A pairs) already present in the current homepage's structured data — reusable verbatim.
- The user confirmed: all current content, numbers, testimonials and client logos are real and verified — none of it is filler that needs to be dropped or fact-checked further.

## Product Principles

1. The site sells, it doesn't publish — every page's structure should end in a clear path to contact, scoped to the right audience (empresas / gobiernos / personas).
2. The three-front specialization is the differentiator and must read as clearly segmented, not blended into generic "agency" messaging.
3. Real trayectoria and real named clients are the central proof — social proof (logos, stats, the CEO's own words from the Informe de Gestión) should be prominent, never generic stock-agency claims.
4. Preserve URLs, SEO, and real content exactly; the old visual execution is evidence/anti-reference, not the old copy or facts.
5. Ship clean: the many live JS bugs already fixed in the current site (infinite error loops, dead scripts, broken links) must not reappear in the rebuild — every new script should be written to fail safely.

## Accessibility & Inclusion

WCAG conformance was part of the original brief; carry it through the redesign (semantic HTML, color contrast, keyboard navigation, alt text using the real image content).
