/**
 * Mobile navigation.
 *
 * モバイルメニューの開閉とアクセシビリティ属性を管理します。
 */
(() => {
	'use strict';

	const header = document.querySelector('.site-header');

	if (!header) {
		return;
	}

	const menuToggle = header.querySelector('.site-header__menu-toggle');
	const navigation = header.querySelector('#global-navigation');

	if (!menuToggle || !navigation) {
		return;
	}

	const labelOpen = menuToggle.dataset.labelOpen;
	const labelClose = menuToggle.dataset.labelClose;

	/**
	 * メニューの表示状態をまとめて更新します。
	 *
	 * @param {boolean} isOpen メニューを開く場合はtrue。
	 * @param {boolean} returnFocus ボタンへフォーカスを戻す場合はtrue。
	 */
	const setMenuState = (isOpen, returnFocus = false) => {
		menuToggle.setAttribute('aria-expanded', String(isOpen));
		menuToggle.setAttribute('aria-label', isOpen ? labelClose : labelOpen);
		navigation.classList.toggle('is-open', isOpen);

		if (returnFocus) {
			menuToggle.focus();
		}
	};

	menuToggle.addEventListener('click', () => {
		const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

		setMenuState(!isOpen);
	});

	navigation.addEventListener('click', (event) => {
		if (event.target.closest('a')) {
			setMenuState(false);
		}
	});

	document.addEventListener('click', (event) => {
		const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

		if (isOpen && !header.contains(event.target)) {
			setMenuState(false);
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

			if (isOpen) {
				setMenuState(false, true);
			}
		}
	});

	const desktopMediaQuery = window.matchMedia('(min-width: 768px)');

	desktopMediaQuery.addEventListener('change', (event) => {
		if (event.matches) {
			setMenuState(false);
		}
	});
})();
