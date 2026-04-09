

<!DOCTYPE html>

<html class="dark" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Digital Archivist | Histoire Vivante de Tournai</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&amp;family=Work+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "on-tertiary-fixed-variant": "#454747",
              "secondary-fixed": "#ffdad4",
              "inverse-primary": "#755b00",
              "surface-container-lowest": "#0e0e0e",
              "on-secondary-fixed-variant": "#920703",
              "tertiary-container": "#d9d9d9",
              "secondary": "#ffb4a8",
              "primary-container": "#D4AF37", /* Updated to Gold accent from Design System */
              "error": "#ffb4ab",
              "primary-fixed-dim": "#ebc24a",
              "on-primary-fixed": "#241a00",
              "tertiary-fixed-dim": "#c6c6c6",
              "on-surface": "#e5e2e1",
              "primary-fixed": "#D4AF37",
              "secondary-fixed-dim": "#ffb4a8",
              "on-background": "#e5e2e1",
              "secondary-container": "#920703",
              "on-primary-container": "#121212",
              "background": "#121212", /* Updated to Dark background from Design System */
              "surface-container": "#201f1f",
              "primary": "#D4AF37",
              "on-error": "#690005",
              "on-primary": "#3d2e00",
              "outline-variant": "#4d4635",
              "on-surface-variant": "#d1c5af",
              "error-container": "#93000a",
              "surface": "#121212",
              "on-tertiary": "#2f3131",
              "surface-container-highest": "#353534",
              "surface-container-high": "#2a2a2a",
              "inverse-on-surface": "#313030",
              "outline": "#99907c",
              "on-secondary": "#690000",
              "surface-container-low": "#1c1b1b",
              "on-error-container": "#ffdad6",
              "surface-tint": "#D4AF37",
              "on-secondary-fixed": "#410000",
              "surface-variant": "#353534",
              "on-primary-fixed-variant": "#584400",
              "on-tertiary-fixed": "#1a1c1c",
              "tertiary-fixed": "#e2e2e2",
              "inverse-surface": "#e5e2e1",
              "on-tertiary-container": "#5d5f5f",
              "tertiary": "#f6f5f5",
              "on-secondary-container": "#ff9a8a",
              "surface-dim": "#121212",
              "surface-bright": "#393939"
            },
            fontFamily: {
              "headline": ["Noto Serif"],
              "body": ["Work Sans"],
              "label": ["Work Sans"]
            },
            borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
          },
        },
      }
    </script>
<style>
      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
      .font-notoSerif { font-family: 'Noto Serif', serif; }
      .font-workSans { font-family: 'Work Sans', sans-serif; }
      .bg-grain {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        opacity: 0.03;
      }
      .hide-scrollbar::-webkit-scrollbar {
        display: none;
      }
      .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
      }
    </style>
</head>
<body class="bg-background text-on-background font-body selection:bg-primary-container selection:text-on-primary-container">
<!-- TopAppBar -->
<nav class="fixed top-0 w-full z-50 bg-[#121212]/60 backdrop-blur-xl flex justify-between items-center px-12 py-6 max-w-full shadow-[0_20px_40px_rgba(0,0,0,0.4)]">
<div class="text-2xl font-bold tracking-tighter text-[#D4AF37] font-notoSerif uppercase">Digital Archivist</div>
<div class="hidden md:flex items-center gap-10 font-notoSerif uppercase tracking-widest text-sm">
<a class="text-[#D4AF37] border-b-2 border-[#D4AF37] pb-1" href="#">Home</a>
<a class="text-[#FFF4E0] hover:text-[#D4AF37] transition-colors duration-300" href="#">Info</a>
<a class="text-[#FFF4E0] hover:text-[#D4AF37] transition-colors duration-300" href="#">Agenda</a>
<a class="text-[#FFF4E0] hover:text-[#D4AF37] transition-colors duration-300" href="#">Recruitment</a>
<a class="text-[#FFF4E0] hover:text-[#D4AF37] transition-colors duration-300" href="#">Contact</a>
</div>
<div class="flex items-center gap-4 text-[#D4AF37]">
<span class="material-symbols-outlined cursor-pointer hover:text-white transition-colors">account_balance</span>
<span class="material-symbols-outlined md:hidden cursor-pointer">menu</span>
</div>
</nav>
<!-- Hero Section -->
<header class="relative h-screen flex items-center justify-center overflow-hidden">
<div class="absolute inset-0 z-0">
<img alt="Vue panoramique de Tournai" class="w-full h-full object-cover scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlz-XOjgbKqkLBCxWTKmyXyftQnYGZEVXuAKoqwUH_YqNvRjNPyRVscH7fcBEYauBv_DE_b0Yuxo-3rail2iXVPXwsWWd5T7nOqx9I16_Na9wakV4moZM_qaVn5snn52_QgPw3nDsX7I8p2dQQLh33lMPh-dVy5EjOHFfOQ3xxHkhyUOK9RRl4mtytaXB-gjyIioyZwmk8HJhGUKt2JXwZf6psefUQz_E46_TPmfcs5qjr_NlP50pER_DjbLfFK2iyYxd6AGYEaOXV"/>
<div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
</div>
<div class="relative z-10 text-center px-6 max-w-5xl">
<p class="font-notoSerif italic text-primary text-xl md:text-2xl mb-4 tracking-wide">Association d'Histoire de Tournai</p>
<h1 class="font-headline text-5xl md:text-8xl text-on-surface font-bold leading-tight tracking-tight mb-8">
                L'histoire vivante de la région de Tournai et ses environs
            </h1>
<div class="flex flex-col md:flex-row gap-6 justify-center mt-12">
<button class="bg-primary text-on-primary-container px-10 py-4 rounded-sm font-bold tracking-widest uppercase text-sm hover:scale-95 transition-transform duration-200">
                    Découvrir notre mission
                </button>
<button class="border border-outline-variant/40 text-on-surface px-10 py-4 rounded-sm font-bold tracking-widest uppercase text-sm hover:bg-white/5 transition-colors">
                    L'agenda des événements
                </button>
</div>
</div>
<div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
<span class="material-symbols-outlined text-primary text-4xl">keyboard_double_arrow_down</span>
</div>
</header>
<!-- Mission Statement -->
<section class="py-32 px-6 md:px-24 bg-surface relative overflow-hidden">
<div class="bg-grain absolute inset-0 pointer-events-none"></div>
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
<div class="relative group">
<div class="absolute -top-6 -left-6 w-full h-full border border-primary/20 -z-10 group-hover:top-0 group-hover:left-0 transition-all duration-500"></div>
<img alt="Mission" class="w-full aspect-[4/5] object-cover rounded-lg shadow-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA1ugf1RIRQOr_QQOSEmomFXotM-QSo_wIGPNXgcKHn-PdzB0RXsLUJ-RBLowkP3aMR7Pi404PPKM7BqRywNHeiymCdyT8ner5tjB5uC5Hypzp8ybXjfiS7mMH4s-4vQXkg-EiOtQYyPhO7xYLy_CuHBYYy3rSvqDlhj_e3FJe34zZX-QG8CmzSb-p-bQGL358mljePIoPpSaIlTKIerWkuNjZ0I_ttl-Z0UT2-ECbxgRwxLATs2T895kRhEMNcBfuEm1QjqtC5tbb"/>
</div>
<div class="space-y-8">
<h2 class="font-headline text-4xl md:text-6xl text-on-surface leading-tight">Une mission contre les préjugés</h2>
<div class="w-24 h-1 bg-primary"></div>
<p class="text-on-surface-variant text-lg leading-relaxed font-light">
                    Notre association s'engage à restaurer la vérité historique par l'action et la pédagogie. Loin des clichés romantiques ou des erreurs cinématographiques, nous redonnons vie au passé avec une rigueur scientifique.
                </p>
<p class="text-on-surface-variant text-lg leading-relaxed font-light">
                    À travers des ateliers, des démonstrations et des recherches approfondies, nous permettons au public de toucher du doigt la réalité de nos ancêtres, de la préhistoire à la Renaissance.
                </p>
<div class="pt-6">
<a class="inline-flex items-center gap-4 text-primary font-bold uppercase tracking-widest text-sm hover:gap-6 transition-all" href="#">
                        En savoir plus sur nos engagements <span class="material-symbols-outlined">arrow_right_alt</span>
</a>
</div>
</div>
</div>
</section>
<!-- Nos Intervenants - Refined Dynamic Carousel Section -->
<section class="py-32 bg-[#0E0E0E] overflow-hidden">
<div class="max-w-7xl mx-auto px-6 md:px-24 mb-16 text-center">
<h2 class="font-headline text-4xl md:text-6xl text-primary mb-6">Nos Intervenants</h2>
<p class="text-on-surface-variant max-w-2xl mx-auto italic font-notoSerif">Revivez les grandes époques qui ont façonné notre territoire à travers le regard de passionnés.</p>
</div>
<div class="relative group px-12 md:px-24">
<!-- Navigation Arrows - Prominent and Gold styled -->
<div class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-20">
<button class="bg-[#121212]/80 hover:bg-[#D4AF37] text-[#D4AF37] hover:text-[#121212] w-14 h-14 rounded-full border border-[#D4AF37]/40 flex items-center justify-center transition-all duration-300 shadow-[0_0_20px_rgba(212,175,55,0.2)] backdrop-blur-md" onclick="document.getElementById('eras-carousel').scrollBy({left: -400, behavior: 'smooth'})">
<span class="material-symbols-outlined text-3xl">chevron_left</span>
</button>
</div>
<div class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-20">
<button class="bg-[#121212]/80 hover:bg-[#D4AF37] text-[#D4AF37] hover:text-[#121212] w-14 h-14 rounded-full border border-[#D4AF37]/40 flex items-center justify-center transition-all duration-300 shadow-[0_0_20px_rgba(212,175,55,0.2)] backdrop-blur-md" onclick="document.getElementById('eras-carousel').scrollBy({left: 400, behavior: 'smooth'})">
<span class="material-symbols-outlined text-3xl">chevron_right</span>
</button>
</div>
<!-- Carousel Container: Responsive Grid-style Flex -->
<div class="flex gap-6 overflow-x-auto hide-scrollbar pb-12 snap-x snap-mandatory scroll-smooth" id="eras-carousel">
<!-- Card 1: La préhistoire -->
<div class="flex-none w-[280px] sm:w-[320px] aspect-[3/4] relative rounded-xl overflow-hidden snap-center group/card border border-white/5 hover:border-primary/50 transition-all duration-500 shadow-2xl">
<img alt="La préhistoire" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover/card:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBH8o1YYBGxY3seYV5NNAyZqwnu9vk87hTZ-JpqRdZkZl24_HIAoBtHRykSVu57xcq7ZpnJv74POdZokR8JMPVVzMU86rymfaAigQbyCRaBoF9M-UbV0hyFs9vvr6nq9LTDYuqPR7gc7UlrTz0hVHfem2FY9Z5GxPfYLYUyEtR_jdtni2JAOlNRTBx9d97uK-zDAd83ZTN3OvFULO1BsXi9mPRCf5fetxXxOaOOCsBftuA8WhhQA94qSSQ6gad5k9DfZT-xvPwK1sjH"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#0E0E0E] via-[#0E0E0E]/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 p-8 w-full transform group-hover/card:translate-y-[-8px] transition-transform duration-500">
<span class="text-primary text-xs uppercase tracking-[0.3em] font-bold block mb-2 font-workSans">Origines</span>
<h3 class="font-headline text-3xl text-[#D4AF37]">La préhistoire</h3>
<div class="h-0.5 w-0 group-hover/card:w-full bg-primary transition-all duration-500 mt-4"></div>
</div>
</div>
<!-- Card 2: Les Gaulois -->
<div class="flex-none w-[280px] sm:w-[320px] aspect-[3/4] relative rounded-xl overflow-hidden snap-center group/card border border-white/5 hover:border-primary/50 transition-all duration-500 shadow-2xl">
<img alt="Les Gaulois" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover/card:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMq2f9m6zQB2QwkRnQIL9Jl96Ce81VXdlPRlXN8c2LUQ8fQ_HYkaksonS8rNxabCE3xaqFKPBqW-8GsZDA9ZJdWUXuaQLVT4jjjDP6rq7_7mv8MzyxkaH3_gjNqZSysrV-XvoiOR4lPn7GqtnhRPgyuGJ9Mso7nhZnOvDj7raUsN5cDq9usVerrMtZivAtgAn54rCcP6grs9LEcI0X8kJpPCPPtkrmB-gD6Npj6VgKqOeSZg975cpqeCM1z0bWN9SHFNwfDUSAv4HK"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#0E0E0E] via-[#0E0E0E]/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 p-8 w-full transform group-hover/card:translate-y-[-8px] transition-transform duration-500">
<span class="text-primary text-xs uppercase tracking-[0.3em] font-bold block mb-2 font-workSans">L'Âge du Fer</span>
<h3 class="font-headline text-3xl text-[#D4AF37]">Les Gaulois</h3>
<div class="h-0.5 w-0 group-hover/card:w-full bg-primary transition-all duration-500 mt-4"></div>
</div>
</div>
<!-- Card 3: Les Gallo-romains -->
<div class="flex-none w-[280px] sm:w-[320px] aspect-[3/4] relative rounded-xl overflow-hidden snap-center group/card border border-white/5 hover:border-primary/50 transition-all duration-500 shadow-2xl">
<img alt="Les Gallo-romains" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover/card:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDct4do60WE089UOw5eJkKqNuTvgNrHxcphK1rSAKYeuxncoYAjCrOUZudGcKwLqUOMi73kC_UnZtn2fXB8BvmLHL-fwpMVgkcBwFiiRE-k7dan5cnfR2qP-CUgysMJOR0kYJj3WAZAkDudYWoH48mNUNIo568BF2LLdKjKGuTYWf-NV54UB4knInVAHJCCHrob-gF-Lg1X1lzCSbcen0vIY_Fs9YlX07G2GAGUUVj-_q1MM-IgclhuPrXbS1sJc1msD9_i-5_DAKvY"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#0E0E0E] via-[#0E0E0E]/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 p-8 w-full transform group-hover/card:translate-y-[-8px] transition-transform duration-500">
<span class="text-primary text-xs uppercase tracking-[0.3em] font-bold block mb-2 font-workSans">Civilisation</span>
<h3 class="font-headline text-3xl text-[#D4AF37]">Gallo-romains</h3>
<div class="h-0.5 w-0 group-hover/card:w-full bg-primary transition-all duration-500 mt-4"></div>
</div>
</div>
<!-- Card 4: Les Francs -->
<div class="flex-none w-[280px] sm:w-[320px] aspect-[3/4] relative rounded-xl overflow-hidden snap-center group/card border border-white/5 hover:border-primary/50 transition-all duration-500 shadow-2xl">
<img alt="Les Francs" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover/card:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDB_0u9mU8LxVmDcT80nqbBXBcl8BiZaJH71AkE4ZNofKx2blYnG5FsBkVv2KxS8J8Rt63Mmw9nPmGYTkGYK93SwAHvOnzG-C7xFDXMXA_ESj_PuR_r-lfpm4ADKQJQIZpCvF3p5Jv66BlfgwXjYCVdvPguN6trSNkJO0ya7XwOhJDgYnvrcELsz9bfYhL_108w-ckAYrkQGbHte7x67R6WMsm59i-aN0e4rlX7oTX6_L2k1MrdKVGG6ge77vfDAomN5ySIo0Vwr82f"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#0E0E0E] via-[#0E0E0E]/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 p-8 w-full transform group-hover/card:translate-y-[-8px] transition-transform duration-500">
<span class="text-primary text-xs uppercase tracking-[0.3em] font-bold block mb-2 font-workSans">Mérovingiens</span>
<h3 class="font-headline text-3xl text-[#D4AF37]">Les Francs</h3>
<div class="h-0.5 w-0 group-hover/card:w-full bg-primary transition-all duration-500 mt-4"></div>
</div>
</div>
<!-- Card 5: Moyen Âge -->
<div class="flex-none w-[280px] sm:w-[320px] aspect-[3/4] relative rounded-xl overflow-hidden snap-center group/card border border-white/5 hover:border-primary/50 transition-all duration-500 shadow-2xl">
<img alt="Moyen Âge" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover/card:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlz-XOjgbKqkLBCxWTKmyXyftQnYGZEVXuAKoqwUH_YqNvRjNPyRVscH7fcBEYauBv_DE_b0Yuxo-3rail2iXVPXwsWWd5T7nOqx9I16_Na9wakV4moZM_qaVn5snn52_QgPw3nDsX7I8p2dQQLh33lMPh-dVy5EjOHFfOQ3xxHkhyUOK9RRl4mtytaXB-gjyIioyZwmk8HJhGUKt2JXwZf6psefUQz_E46_TPmfcs5qjr_NlP50pER_DjbLfFK2iyYxd6AGYEaOXV"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#0E0E0E] via-[#0E0E0E]/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 p-8 w-full transform group-hover/card:translate-y-[-8px] transition-transform duration-500">
<span class="text-primary text-xs uppercase tracking-[0.3em] font-bold block mb-2 font-workSans">Médiéval</span>
<h3 class="font-headline text-3xl text-[#D4AF37]">Le Moyen Âge</h3>
<div class="h-0.5 w-0 group-hover/card:w-full bg-primary transition-all duration-500 mt-4"></div>
</div>
</div>
<!-- Card 6: Renaissance -->
<div class="flex-none w-[280px] sm:w-[320px] aspect-[3/4] relative rounded-xl overflow-hidden snap-center group/card border border-white/5 hover:border-primary/50 transition-all duration-500 shadow-2xl">
<img alt="Renaissance" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover/card:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA1ugf1RIRQOr_QQOSEmomFXotM-QSo_wIGPNXgcKHn-PdzB0RXsLUJ-RBLowkP3aMR7Pi404PPKM7BqRywNHeiymCdyT8ner5tjB5uC5Hypzp8ybXjfiS7mMH4s-4vQXkg-EiOtQYyPhO7xYLy_CuHBYYy3rSvqDlhj_e3FJe34zZX-QG8CmzSb-p-bQGL358mljePIoPpSaIlTKIerWkuNjZ0I_ttl-Z0UT2-ECbxgRwxLATs2T895kRhEMNcBfuEm1QjqtC5tbb"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#0E0E0E] via-[#0E0E0E]/40 to-transparent"></div>
<div class="absolute bottom-0 left-0 p-8 w-full transform group-hover/card:translate-y-[-8px] transition-transform duration-500">
<span class="text-primary text-xs uppercase tracking-[0.3em] font-bold block mb-2 font-workSans">Humanisme</span>
<h3 class="font-headline text-3xl text-[#D4AF37]">Renaissance</h3>
<div class="h-0.5 w-0 group-hover/card:w-full bg-primary transition-all duration-500 mt-4"></div>
</div>
</div>
</div>
</div>
<!-- Pagination Dots -->
<div class="flex justify-center gap-2 mt-4">
<div class="w-3 h-1 rounded-full bg-primary"></div>
<div class="w-1.5 h-1.5 rounded-full bg-primary/20"></div>
<div class="w-1.5 h-1.5 rounded-full bg-primary/20"></div>
</div>
</section>
<!-- Map Section -->
<section class="py-32 bg-surface flex flex-col items-center">
<div class="w-full max-w-7xl px-6 md:px-12 grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
<div class="lg:col-span-1 space-y-6">
<h2 class="font-headline text-4xl text-primary">Carte de la zone d'activité</h2>
<p class="text-on-surface-variant font-light leading-relaxed">
                    Découvrez l'étendue de nos interventions et les sites historiques que nous préservons et animons à travers la Wallonie picarde et au-delà.
                </p>
<div class="space-y-4">
<div class="flex items-center gap-4 group cursor-pointer">
<div class="w-10 h-10 rounded-full border border-primary/30 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary-container transition-all">
<span class="material-symbols-outlined">location_on</span>
</div>
<div>
<p class="text-on-surface font-bold">Tournai Centre</p>
<p class="text-xs text-on-surface-variant">Siège de l'association</p>
</div>
</div>
<div class="flex items-center gap-4 group cursor-pointer">
<div class="w-10 h-10 rounded-full border border-primary/30 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary-container transition-all">
<span class="material-symbols-outlined">castle</span>
</div>
<div>
<p class="text-on-surface font-bold">Pecq &amp; environs</p>
<p class="text-xs text-on-surface-variant">Zones de fouilles et reconstitution</p>
</div>
</div>
</div>
</div>
<div class="lg:col-span-2 relative h-[500px] w-full rounded-2xl overflow-hidden border border-outline-variant/20 shadow-2xl">
<div class="absolute inset-0 bg-[#1a1a1a]">
<img alt="Carte historique" class="w-full h-full object-cover opacity-40 grayscale sepia" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3p0DgzjnXyOgmOusouJTGAbq_kBCFg_xjjuLJfIEZd1MpaKcBqbonSrazoLIshgkAArsfjCn-Xrb2QdhkzU3fiQQlje6BwzLPD80w4mcTXul18zjxEEPhuXW0tpvryrBvRSz2QkZqX3AoLZQ9x9fS24b0zUFuYUsA4VsvpPpYdQAZW03ioCG-srebYYk4u5kRqbYa4xpgmgYBnLe4n2BvlgZNY8tInktYxC8fIxFeauisycPrnUM-fy6DPeESSwVDPlyxBLxrHrHP"/>
</div>
<div class="absolute top-1/4 left-1/3 group cursor-pointer">
<div class="w-4 h-4 bg-primary rounded-full animate-ping absolute"></div>
<div class="w-4 h-4 bg-primary rounded-full relative z-10 border-2 border-background"></div>
<div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 bg-surface-container-highest px-3 py-1 rounded shadow-lg text-xs font-bold text-primary opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Tournai</div>
</div>
<div class="absolute bottom-6 right-6 flex flex-col gap-2">
<button class="w-10 h-10 bg-surface-container-highest text-primary flex items-center justify-center rounded-lg hover:bg-primary hover:text-on-primary-container transition-colors"><span class="material-symbols-outlined">add</span></button>
<button class="w-10 h-10 bg-surface-container-highest text-primary flex items-center justify-center rounded-lg hover:bg-primary hover:text-on-primary-container transition-colors"><span class="material-symbols-outlined">remove</span></button>
</div>
</div>
</div>
</section>
<!-- Interactive Quiz -->
<section class="py-32 px-6 bg-surface-container-low relative overflow-hidden">
<div class="max-w-4xl mx-auto text-center space-y-12">
<span class="font-notoSerif italic text-primary text-2xl">Testez vos connaissances</span>
<h2 class="font-headline text-5xl md:text-7xl text-on-surface leading-tight">Vrai ou faux ?</h2>
<div class="bg-surface-container-highest p-12 rounded-2xl border border-outline-variant/10 shadow-xl relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -translate-y-16 translate-x-16"></div>
<p class="text-2xl font-headline text-on-surface mb-12">"Les Gaulois portaient tous des casques à ailes et des tresses blondes."</p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<button class="py-6 border-2 border-outline-variant/30 rounded-lg font-bold text-xl text-on-surface hover:border-primary hover:bg-primary/10 transition-all flex items-center justify-center gap-4">
<span class="material-symbols-outlined text-green-500">check_circle</span> Vrai
                    </button>
<button class="py-6 border-2 border-outline-variant/30 rounded-lg font-bold text-xl text-on-surface hover:border-primary hover:bg-primary/10 transition-all flex items-center justify-center gap-4">
<span class="material-symbols-outlined text-red-500">cancel</span> Faux
                    </button>
</div>
</div>
</div>
</section>
<!-- Latest News -->
<section class="py-32 px-6 md:px-24 bg-surface">
<div class="max-w-7xl mx-auto">
<div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
<div>
<h2 class="font-headline text-4xl md:text-5xl text-on-surface mb-4">Dernières Découvertes</h2>
<p class="text-on-surface-variant">L'actualité de l'archiviste et du patrimoine local.</p>
</div>
<button class="text-primary border-b border-primary pb-1 uppercase tracking-widest text-xs font-bold hover:text-white hover:border-white transition-all">Voir toutes les actualités</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-12">
<article class="group">
<div class="aspect-video overflow-hidden rounded-lg mb-6">
<img alt="Article archaeology" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxyiIlzGezfClUcbb8ph94hfvUB8IIoVEDOsgsGFqBy59Db6eOllF5j7ndsLl69cxDWdDqB2bs5snpCVSbqmWW3qZVizf_U6SH_bM-40N7O3FWkIsvdL6kJ1WIEhisCIc2gQ_OnqArOIfhfERuxKxqPjaZHcUVcey0owZu5QGTIqqgqteAG1FvzX2012ynGNDc5TOHfCcLh5TdBFJuj3645YejLsb1teicFddIq3JU0aAWsG8-8HPZVNjA_tfzO9MyjPeRLnV39iVm"/>
</div>
<span class="text-primary text-xs font-bold uppercase tracking-widest">Recherches</span>
<h3 class="font-headline text-2xl text-on-surface mt-3 mb-4 group-hover:text-primary transition-colors">Le mystère des cryptes de Tournai</h3>
<p class="text-on-surface-variant line-clamp-3 mb-6 font-light">De nouveaux relevés laser révèlent des galeries insoupçonnées sous le centre historique.</p>
<a class="flex items-center gap-2 text-on-surface font-bold text-sm uppercase group-hover:gap-4 transition-all" href="#">Lire la suite <span class="material-symbols-outlined">chevron_right</span></a>
</article>
<article class="group">
<div class="aspect-video overflow-hidden rounded-lg mb-6">
<img alt="Article Event" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1Fk91b_qehiVHoh42aV7F6TMcKUKWj4Mim_nbGQi7NacPuKl15Fg3bADt0kBSxzfwU2QQAiRjZB2PO5NIxULBxtSR1BiTE07hbeBsnWEOK5Gx2etmGfxpbVtrvVl8CEcbcDdqpqmuYMJ-z-JqJ8o7WaaRxKoGh4z5VVNUrqSoMzeT8jK-29DqiIyxI-bgdRk-HSuMl3Hs61l5o9rkJgQJlH-yqf_jaZaMglvB1-sQBpZ4slfRtwVKPVChEVJ9fzKHXmZ0f41pEvnF"/>
</div>
<span class="text-primary text-xs font-bold uppercase tracking-widest">Événements</span>
<h3 class="font-headline text-2xl text-on-surface mt-3 mb-4 group-hover:text-primary transition-colors">Retour sur le campement médiéval</h3>
<p class="text-on-surface-variant line-clamp-3 mb-6 font-light">Près de 2000 visiteurs sont venus à la rencontre de nos passionnés le week-end dernier.</p>
<a class="flex items-center gap-2 text-on-surface font-bold text-sm uppercase group-hover:gap-4 transition-all" href="#">Lire la suite <span class="material-symbols-outlined">chevron_right</span></a>
</article>
<article class="group">
<div class="aspect-video overflow-hidden rounded-lg mb-6">
<img alt="Article Artifact" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhrH0dj-nSjHHxYgl4JCmR0GUHyfLEz1i-8lA5MaSFN7WFpVdA9oGARanrq70UdgEPqgzd4Mba4bre1HX3oTaELcGCLXopSR-UweM8JFcnRhC4PZbvSZHQJTTJD4g_vPyX_ewqYhoOHeL1NlTZUdbj61EXxUFmf6HsaaHH_rzhJeQ9Ov0I-4RXu21YWafyKMGXEJWjFP3fNfGBvYmC62W-W7bBC7GKQNNfhEYsbfyiyD4yVxwlMEXVMCn_s6trYiczqeMcwl5VsQMO"/>
</div>
<span class="text-primary text-xs font-bold uppercase tracking-widest">Objets</span>
<h3 class="font-headline text-2xl text-on-surface mt-3 mb-4 group-hover:text-primary transition-colors">La fibule disparue retrouvée à Antoing</h3>
<p class="text-on-surface-variant line-clamp-3 mb-6 font-light">Une pièce exceptionnelle datant du IIIe siècle a été identifiée par nos experts locaux.</p>
<a class="flex items-center gap-2 text-on-surface font-bold text-sm uppercase group-hover:gap-4 transition-all" href="#">Lire la suite <span class="material-symbols-outlined">chevron_right</span></a>
</article>
</div>
</div>
</section>
<!-- Footer -->
<footer class="bg-[#0E0E0E] w-full py-12 px-12 border-t border-[#D4AF37]/10 flex flex-col md:flex-row justify-between items-center gap-8">
<div class="text-lg font-notoSerif text-[#D4AF37]">Digital Archivist</div>
<div class="text-on-surface font-workSans text-xs opacity-70 text-center md:text-left">
            © 2024 Digital Archivist Historical Association. Preserving the echoes of time.
        </div>
<div class="flex flex-wrap justify-center gap-6">
<a class="text-on-surface/60 hover:text-on-surface transition-opacity font-workSans text-xs" href="#">Privacy Policy</a>
<a class="text-on-surface/60 hover:text-on-surface transition-opacity font-workSans text-xs" href="#">Terms of Service</a>
<a class="text-on-surface/60 hover:text-on-surface transition-opacity font-workSans text-xs" href="#">Legal Mentions</a>
<a class="text-on-surface/60 hover:text-on-surface transition-opacity font-workSans text-xs" href="#">Contact</a>
</div>
</footer>
</body></html>