<?php
/**
 * Contact page template.
 *
 * お問い合わせ固定ページ用テンプレートです。
 * 現時点ではメール送信処理は持たせず、入力後にThanksページへ遷移します。
 */

get_header();

$contact_hero_image_id = get_post_thumbnail_id();
?>

<main class="site-main contact-page">
	<?php
	get_template_part(
		'template-parts/components/page',
		'hero',
		array(
			'eyebrow'  => 'CONTACT',
			'title'    => "Let's Talk",
			'lead'     => "制作のご相談、採用について、\nその他お気軽にお問い合わせください。",
			'image_id' => $contact_hero_image_id,
		)
	);
	?>

	<section class="contact-page__section" aria-labelledby="contact-page-title">
		<div class="contact-page__inner l-container">
			<?php
			get_template_part(
				'template-parts/components/section',
				'heading',
				array(
					'eyebrow'    => '( CONTACT )',
					'title'      => 'Get in Touch',
					'heading_id' => 'contact-page-title',
				)
			);
			?>

			<div class="contact-page__lead">
				<p>
					制作のご相談、採用に関するご連絡、<br>
					その他のお問い合わせはこちらからお願いいたします。
				</p>
				<p>内容を確認のうえ、ご返信いたします。</p>
			</div>

			<form
				class="contact-form"
				action="<?php echo esc_url( home_url( '/thanks/' ) ); ?>"
				method="post"
			>
				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-type">
						お問い合わせ種別
						<span class="contact-form__required" aria-hidden="true">*</span>
					</label>

					<select
						class="contact-form__control contact-form__select"
						id="contact-type"
						name="contact_type"
						required
					>
						<option value="">選択してください</option>
						<option value="recruit">採用について</option>
						<option value="production">制作のご相談</option>
						<option value="business">お仕事のご相談</option>
						<option value="other">その他</option>
					</select>
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-name">
						お名前
						<span class="contact-form__required" aria-hidden="true">*</span>
					</label>

					<input
						class="contact-form__control"
						type="text"
						id="contact-name"
						name="contact_name"
						autocomplete="name"
						required
					>
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-email">
						メールアドレス
						<span class="contact-form__required" aria-hidden="true">*</span>
					</label>

					<input
						class="contact-form__control"
						type="email"
						id="contact-email"
						name="contact_email"
						autocomplete="email"
						required
					>
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-organization">
						会社名・組織名
					</label>

					<input
						class="contact-form__control"
						type="text"
						id="contact-organization"
						name="contact_organization"
						autocomplete="organization"
					>
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-message">
						お問い合わせ内容
						<span class="contact-form__required" aria-hidden="true">*</span>
					</label>

					<textarea
						class="contact-form__control contact-form__textarea"
						id="contact-message"
						name="contact_message"
						rows="7"
						required
					></textarea>
				</div>

				<div class="contact-form__field contact-form__field--privacy">
					<label class="contact-form__checkbox-label" for="contact-privacy">
						<input
							class="contact-form__checkbox"
							type="checkbox"
							id="contact-privacy"
							name="contact_privacy"
							value="1"
							required
						>
						<span>
							プライバシーポリシーに同意する
							<span class="contact-form__required" aria-hidden="true">*</span>
						</span>
					</label>
				</div>

				<div class="contact-form__action">
					<button class="c-button contact-form__button" type="submit">
						送信
					</button>
				</div>
			</form>
		</div>
	</section>
</main>

<?php get_footer(); ?>
