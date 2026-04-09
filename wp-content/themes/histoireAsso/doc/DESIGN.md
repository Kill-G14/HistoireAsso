# Design System Strategy: The Digital Archivist

## 1. Overview & Creative North Star
The "Digital Archivist" is the guiding philosophy of this design system. It moves the historical association away from a dated, "wiki-style" layout toward a high-end editorial experience that feels like a curated museum exhibition. 

The goal is to evoke the gravitas of history through **intentional asymmetry**, **layered depth**, and **negative space**. We avoid the common pitfall of "kitsch" (parchment scrolls, wax seals, or heavy textures). Instead, we achieve "historical-chic" through a sophisticated interplay of deep charcoal voids and luminous, serif-led typography. This system breaks the rigid grid by allowing high-quality imagery to bleed into margins and overlapping typography to bridge content sections, creating a sense of immersion and flow.

## 2. Colors
Our palette balances the weight of antiquity with modern digital clarity. We move away from the harsh blacks and pure whites of the legacy site toward a nuanced, tonal spectrum.

### The Foundation
- **Background (`#131313`)**: A deep, charcoal "Obsidian." This provides the dark, immersive canvas for our "exhibition."
- **Primary (`#FFF4E0`)**: A "Parchment" cream used for high-contrast reading surfaces and major typography.
- **Primary Container (`#FFD45A`)**: Our "Refined Gold." Use this sparingly for emphasis, call-to-action (CTA) accents, and active states.
- **Secondary (`#FFB4A8`) / Secondary Container (`#920703`)**: A "Deep Madder" red, used for critical alerts or specific historical "bloodline" highlights.

### Layout Rules
- **The No-Line Rule**: Prohibit the use of 1px solid borders to define sections. Boundaries must be defined by shifts in background color. For example, a `surface-container-low` section should sit directly against a `surface` background to create a "silent" edge.
- **Surface Hierarchy & Nesting**: Use the surface tiers to create physical depth. A card component should use `surface-container-highest` to sit atop a `surface-container-low` background. This "paper-on-stone" stacking logic replaces the need for dividers.
- **The Glass & Gradient Rule**: For floating navigation or modal overlays, use **Glassmorphism**. Combine `surface-variant` with a `backdrop-blur` of 12px-20px and an opacity of 60%. This mimics a translucent lens placed over historical artifacts.

## 3. Typography
Typography is the voice of the Archivist. We utilize a high-contrast scale to create an editorial rhythm.

- **Display & Headlines (`notoSerif`)**: This is our "Classic Serif." It carries the weight of authority. Use `display-lg` (3.5rem) for hero statements with tight letter-spacing to feel like a bespoke masthead.
- **Body & Labels (`workSans`)**: Our "Modern Sans-Serif." It provides a clean, neutral counterpoint to the serif. It ensures that long-form historical educational content remains legible on dark backgrounds.
- **Typographic Hierarchy**: Use wide margins and generous line-heights (1.6 for body text) to allow the "Parchment" text to breathe against the "Obsidian" background. Headlines should often be center-aligned to evoke a sense of ceremony.

## 4. Elevation & Depth
Depth in this system is atmospheric, not structural. We avoid heavy dropshadows in favor of tonal layering and light-play.

- **The Layering Principle**: Stack tiers from darkest to lightest. `surface-container-lowest` (`#0E0E0E`) acts as a deep well, while `surface-bright` (`#393939`) acts as a highlight.
- **Ambient Shadows**: For floating elements, use extra-diffused shadows. 
    - *Example*: `box-shadow: 0 20px 40px rgba(0,0,0, 0.4);`
    - The shadow color should be a tinted version of the background to feel like natural occlusion rather than a "hovering" effect.
- **The Ghost Border Fallback**: If an element requires a border for accessibility (e.g., input fields), use the `outline-variant` token at 15% opacity. It should be felt, not seen.
- **Signature Textures**: In hero sections, apply a 2% grain overlay or a subtle noise texture to `surface` containers to mimic the tactile quality of aged stone or heavy-stock paper.

## 5. Components

### Buttons
- **Primary**: A solid `primary-container` (Gold) fill with `on-primary-container` text. Roundedness should be `sm` (0.125rem) to maintain a sharp, architectural look.
- **Secondary**: A "Ghost" style with a `primary` (Parchment) text and an `outline-variant` border at 20% opacity.
- **Tertiary**: Text-only, using `primary` with a subtle gold underline on hover.

### Cards & Lists
- **Rule**: Forbid divider lines.
- **Implementation**: Use a vertical spacing of `8` (2rem) from the Spacing Scale to separate content items. Use a `surface-container-low` background for card items to lift them subtly from the page.
- **Photography Integration**: Image containers should use a `lg` (0.5rem) corner radius. Use a gradient overlay (`surface` to transparent) on the bottom 30% of images to allow text to bleed over the photography seamlessly.

### Inputs & Selection
- **Input Fields**: Use the "Ghost Border" rule. Labels should use `label-md` in `on-surface-variant` (muted gold/tan) to feel integrated into the "Archivist" aesthetic.
- **Chips**: Use for historical eras (e.g., "Gallo-Roman"). These should be `surface-container-high` with `on-surface` text. No borders.

### Signature Component: The "Artifact Carousel"
A bespoke component for the association. Use large, high-resolution photography of historical artifacts that overlap the edges of their container, breaking the container's `overflow: hidden` property to create a 3D effect.

## 6. Do's and Don'ts

### Do
- **Do** use asymmetrical layouts where imagery sits on the far left and text sits on the center-right.
- **Do** treat "Parchment" (`#FFF4E0`) as your primary light source.
- **Do** use `display-lg` typography for single, impactful words or dates to create "visual anchors" in the layout.
- **Do** use `surface-container-highest` for interactive elements like tooltips to ensure they "pop" against the dark background.

### Don't
- **Don't** use 100% opaque, high-contrast borders or dividers. They shatter the immersive atmosphere.
- **Don't** use bright, neon colors. If something needs attention, use the Gold (`#FFD45A`) or the Deep Red (`#8B0000`).
- **Don't** crowd the layout. If in doubt, increase the spacing from `8` (2rem) to `12` (3rem).
- **Don't** use "kitsch" historical assets like parchment textures with burnt edges. The "history" should come from the photography and the typography, not the UI chrome.