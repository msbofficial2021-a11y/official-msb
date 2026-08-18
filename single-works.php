<?php
/**
 * Single Work template.
 *
 * Worksの個別投稿ページを表示します。
 */

get_header();

while ( have_posts() ) :
	the_post();

	/*
	 * ACFが無効な場合でもFatal errorにならないように、
	 * get_field()が利用できる場合だけ値を取得します。
	 */
	$work_year         = function_exists( 'get_field' ) ? get_field( 'work_year' ) : '';
	$work_type         = function_exists( 'get_field' ) ? get_field( 'work_type' ) : '';
	$work_role         = function_exists( 'get_field' ) ? get_field( 'work_role' ) : '';
	$work_platform     = function_exists( 'get_field' ) ? get_field( 'work_platform' ) : '';
	$work_period       = function_exists( 'get_field' ) ? get_field( 'work_period' ) : '';
	$work_status       = function_exists( 'get_field' ) ? get_field( 'work_status' ) : '';
	$work_technologies = function_exists( 'get_field' ) ? get_field( 'work_technologies' ) : '';
	$main_visual_id    = function_exists( 'get_field' ) ? get_field( 'work_main_visual' ) : 0;
	$work_summary      = function_exists( 'get_field' ) ? get_field( 'work_summary' ) : '';
	$work_url          = function_exists( 'get_field' ) ? get_field( 'work_url' ) : '';
	$work_github_url   = function_exists( 'get_field' ) ? get_field( 'work_github_url' ) : '';

	/*
	 * ACFには管理しやすい英語の値を保存し、
	 * 画面上では日本語へ変換して表示します。
	 */
	$status_labels = array(
		'released'    => '公開中',
		'private'     => '非公開',
		'development' => '開発中',
	);

	$work_status_label = isset( $status_labels[ $work_status ] )
		? $status_labels[ $work_status ]
		: '';

	/*
	 * 項目名と値を配列にまとめることで、
	 * 同じHTMLを繰り返し書かずに詳細情報を表示します。
	 */
	$work_details = array(
		'制作年'       => $work_year,
		'制作種別'     => $work_type,
		'担当範囲'     => $work_role,
		'プラットフォーム' => $work_platform,
		'制作期間'     => $work_period,
		'公開状態'     => $work_status_label,
		'使用技術'     => $work_technologies,
	);
	?>

	<main id="primary" class="site-main">
		<article <?php post_class( 'work-single' ); ?>>
            <header class="work-single__header">
                <?php if ( $main_visual_id ) : ?>
                    <div
                        class="work-single__header-media"
                        aria-hidden="true"
                    >
                        <?php
                        echo wp_get_attachment_image(
                            (int) $main_visual_id,
                            'full',
                            false,
                            array(
                                'class'   => 'work-single__header-image',
                                'alt'     => '',
                                'loading' => 'eager',
                            )
                        );
                        ?>
                    </div>
                <?php endif; ?>

                <div class="work-single__header-inner l-container">
                    <p class="work-single__eyebrow">
                        ( WORKS )
                    </p>

                    <h1 class="work-single__title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="work-single__meta">
                        <?php if ( $work_platform ) : ?>
                            <span><?php echo esc_html( $work_platform ); ?></span>
                        <?php endif; ?>

                        <?php if ( $work_role ) : ?>
                            <span><?php echo esc_html( $work_role ); ?></span>
                        <?php endif; ?>

                        <?php if ( $work_year ) : ?>
                            <span><?php echo esc_html( $work_year ); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </header>

			<div class="work-single__content">
				<div class="l-container">
					<?php if ( $main_visual_id ) : ?>
						<figure class="work-single__main-visual">
							<?php
							echo wp_get_attachment_image(
								(int) $main_visual_id,
								'full',
								false,
								array(
									'class'         => 'work-single__image',
									'fetchpriority' => 'high',
								)
							);
							?>
						</figure>
					<?php endif; ?>

					<div class="work-single__overview">
						<div class="work-single__summary">
							<p class="work-single__section-label">
								( OVERVIEW )
							</p>

							<h2 class="work-single__section-title">
								制作概要
							</h2>

							<?php if ( $work_summary ) : ?>
								<p class="work-single__summary-text">
									<?php echo esc_html( $work_summary ); ?>
								</p>
							<?php endif; ?>
						</div>

						<dl class="work-single__details">
							<?php foreach ( $work_details as $label => $value ) : ?>
								<?php if ( $value ) : ?>
									<div class="work-single__detail">
										<dt><?php echo esc_html( $label ); ?></dt>
										<dd><?php echo esc_html( $value ); ?></dd>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</dl>
					</div>

					<?php if ( trim( get_the_content() ) ) : ?>
						<div class="work-single__body">
							<?php the_content(); ?>
						</div>
					<?php endif; ?>

					<?php if ( $work_url || $work_github_url ) : ?>
						<div class="work-single__actions">
							<?php if ( $work_url ) : ?>
								<a
									class="c-button c-button--primary"
									href="<?php echo esc_url( $work_url ); ?>"
									target="_blank"
									rel="noopener noreferrer"
								>
									サイトを見る
								</a>
							<?php endif; ?>

							<?php if ( $work_github_url ) : ?>
								<a
									class="c-button"
									href="<?php echo esc_url( $work_github_url ); ?>"
									target="_blank"
									rel="noopener noreferrer"
								>
									GitHubを見る
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="work-single__back">
						<a
							class="c-button"
							href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>"
						>
							Works一覧へ戻る
						</a>
					</div>
				</div>
			</div>
		</article>
	</main>

	<?php
endwhile;

get_footer();
