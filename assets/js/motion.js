/* Foresta+: parallasse e comparsa dei contenuti allo scorrimento. */
(() => {
	const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	if (reduce) return;
	const root = document.documentElement;
	root.classList.add('jr-motion');

	// Comparsa: ogni elemento entra con un piccolo ritardo rispetto ai fratelli.
	const revealSelector = '.jr-reveal, .jr-whats > *, .jr-flyers > *, .jr-posts li, .jr-access__card, .jr-card, .jr-day, .jr-stat, .jr-content > .wp-block-image, .jr-gallery > *';
	const revealed = document.querySelectorAll(revealSelector);
	if ('IntersectionObserver' in window) {
		const io = new IntersectionObserver((entries) => {
			entries.forEach((e) => {
				if (e.isIntersecting) {
					e.target.classList.add('is-in');
					io.unobserve(e.target);
				}
			});
		}, { rootMargin: '0px 0px -8% 0px' });
		revealed.forEach((el) => {
			const i = Array.prototype.indexOf.call(el.parentNode.children, el);
			el.style.setProperty('--jr-delay', (i % 6) * 90 + 'ms');
			io.observe(el);
		});
	} else {
		revealed.forEach((el) => el.classList.add('is-in'));
	}

	// Parallasse.
	//  .jr-px-bg  → l'immagine di sfondo del blocco Copertina scorre più lenta della pagina
	//  .jr-px-sN  → l'elemento si sposta di N/100 rispetto allo scorrimento (negativo = più veloce)
	const items = [];
	document.querySelectorAll('.jr-px-bg').forEach((ref) => {
		const el = ref.querySelector('.wp-block-cover__image-background');
		if (el) items.push({ el, ref, bg: true });
	});
	document.querySelectorAll('[class*="jr-px-s"]').forEach((el) => {
		const m = el.className.match(/jr-px-s(-?\d+)/);
		if (m) items.push({ el, ref: el.parentElement, speed: parseInt(m[1], 10) / 100 });
	});
	if (!items.length) return;

	let queued = false;
	const update = () => {
		queued = false;
		const vh = window.innerHeight;
		for (const it of items) {
			const r = it.ref.getBoundingClientRect();
			if (r.bottom < -100 || r.top > vh + 100) continue;
			const offset = r.top + r.height / 2 - vh / 2; // 0 quando è al centro dello schermo
			const y = it.bg
				? (offset / (vh / 2 + r.height / 2)) * r.height * 0.16 // l'immagine è più alta del 40%: resta sempre coperta
				: -offset * it.speed;
			it.el.style.transform = `translate3d(0, ${y.toFixed(1)}px, 0)`;
		}
	};
	const queue = () => {
		if (!queued) {
			queued = true;
			requestAnimationFrame(update);
		}
	};
	window.addEventListener('scroll', queue, { passive: true });
	window.addEventListener('resize', queue);
	update();
})();
