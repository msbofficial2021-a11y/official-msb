/**
 * Accessible Accordion Demo
 *
 * aria-expandedとhidden属性を同期して、
 * アコーディオンの開閉状態を管理します。
 */

(() => {
	const accordions = document.querySelectorAll(".accordion");

	accordions.forEach((accordion) => {
		const buttons = accordion.querySelectorAll(
			".accordion__button"
		);

		buttons.forEach((button) => {
			const panelId = button.getAttribute("aria-controls");
			const panel = document.getElementById(panelId);

			/*
			 * aria-controlsと一致するパネルが存在しない場合は、
			 * エラーを起こさず、そのボタンの処理だけを終了します。
			 */
			if (!panel) {
				return;
			}

			button.addEventListener("click", () => {
				const isExpanded =
					button.getAttribute("aria-expanded") === "true";

				button.setAttribute(
					"aria-expanded",
					String(!isExpanded)
				);

				panel.hidden = isExpanded;
			});
		});
	});
})();
