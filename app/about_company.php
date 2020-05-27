<?php 
	$locale = !empty($_GET['locale']) ? $_GET['locale'] : $locale = 'ru_RU';
	$domain = 'about_company';

	switch ($locale) {
			case 'ru_RU':
					$locale = 'ru_RU';
					$lang = 'ru';
					$prefix = '';
					break;
			case 'uk_UA':
					$locale = 'uk_UA';
					$lang = 'uk';
					$prefix = '/uk';
					break;
			case 'en_US':
					$locale = 'en_US';
					$lang = 'en';
					$prefix = '/en';
					break;
			default:
					$locale = 'ru_RU';
					$lang = 'ru';
					$prefix = '';
	}

	setlocale(LC_MESSAGES, $locale);
	putenv("LANGUAGE={$locale}");
	bindtextdomain($domain, './locale');
	textdomain($domain);
	bind_textdomain_codeset($domain, 'UTF-8');
?>

<!DOCTYPE html>
<html lang=<?php echo($lang) ?>>

<head>
	<meta charset="utf-8">
	<title><?php echo _('Билеты на автобус - купить онлайн - Ticket.xyz'); ?></title>
	<meta name="description" content="<?php echo _('Купить билеты на автобус онлайн'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="/images/favicon.png">

	<meta property="og:site_name" content="<?php echo ($_SERVER['HTTP_HOST']); ?>" />
	<meta property="og:title" content="<?php echo _('Купить билеты на автобус'); ?>" />
	<meta property="og:description" content="<?php echo _('Купить билеты на автобус по выгодной цене на любое направление онлайн'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo ('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" />
	<meta property="og:image" content="/images/favicon.png" />
	<meta property="og:locale" content="<?php echo ($locale); ?>" />

	<link rel="stylesheet" href="/css/app.min.css">
	<link rel="stylesheet" href="/libs/sharps/dist/sharps.min.css">
	<link href="/libs/air-datepicker/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
</head>

<body class="page">
	<div class="page__wrapper">
		<div class="page__content">
			<header class="header">

				<div class="header__upper header-upper">
					<div class="header-upper__wrapper">
						<div class="header-upper__logo logo">
							<a class="logo__link" <?php if($_SERVER['REQUEST_URI'] !== "$prefix/") { echo("href=\"$prefix/\"");}; ?>>
								<img class="logo__img" src="/images/dest/logo-1.png" alt="Tiket">
							</a>
						</div>

						<div class="header-upper__menu menu">	
							<ul class="menu__list">

								<li class="menu__item contacts"><span class="contacts__link link js-contacts__dropdown dropdown"><?php echo _('Наши контакты'); ?></span>
									<div class="js-contacts__dropdown dropdown__container">
										<ul class="dropdown__list">
											<li class="dropdown__item"><a class="dropdown__content link link_type_pnone" href="tel:+380567931921">+38 (056)-793-19-21</a></li>
											<li class="dropdown__item"><a class="dropdown__content link link_type_pnone" href="tel:+380567933821">+38 (056)-793-38-21</a></li>
											<li class="dropdown__item"><a class="dropdown__content link link_type_mail" href="mailto:contact@Ticket.xyz">contact@Ticket.xyz</a></li>
										</ul>
									</div>
								</li>

								<li class="menu__item languge"><span class="language__link link js-language__dropdown dropdown"><?php echo strtoupper($lang); ?></span>
									<div class="js-language__dropdown dropdown__container">
										<ul class="dropdown__list">
											<li class="dropdown__item"><a class="dropdown__content link" href="<?php if($lang !== 'ru'){echo(substr($_SERVER['REQUEST_URI'], 3));}; ?>">[RU] Русский</a></li>
											<li class="dropdown__item"><a class="dropdown__content link" href="<?php if($lang == 'ru'){echo('/uk' . $_SERVER['REQUEST_URI']);}else{echo('/uk' . substr($_SERVER['REQUEST_URI'], 3));}; ?>">[UK] Українська</a></li>
											<li class="dropdown__item"><a class="dropdown__content link" href="<?php if($lang == 'ru'){echo('/en' . $_SERVER['REQUEST_URI']);}else{echo('/en' . substr($_SERVER['REQUEST_URI'], 3));}; ?>">[EN] English</a></li>
										</ul>
									</div>
								</li>

								<li class="menu__item"><a class="button button_type_sign-in" href="<?php echo($prefix . '/login'); ?>"><?php echo _('Войти'); ?></a></li>

								<li class="menu__item"><a class="button button_type_sign-up" href="<?php echo($prefix . '/register'); ?>"><?php echo _('Регистрация'); ?></a></li>

							</ul>
						</div>

						<div class="header-upper__hamburger-menu hamburger-menu hamburger-menu__button hamburger-menu__button_open"></div>
										
					</div>
				</div>
				
				<div class="hamburger-menu">
					<div class="hamburger-menu__container">

						<div class="hamburger-menu__upper">
							<div class="hamburger-menu__wrapper">
								<div class="hamburger-menu__logo logo"><img class="logo__img" src="/images/dest/logo-1.png" alt="Tiket"></div>
								<div class="hamburger-menu__button hamburger-menu__button_close"></div>
							</div>
						</div>

						<div class="hamburger-menu__wrapper">
							<ul class="hamburger-menu__list">

								<li class="hamburger-menu__item">
									<a href="<?php echo($prefix . '/login'); ?>" class="hamburger-menu__content link link_type_sign-in"><?php echo _('Вход'); ?></a>
								</li>

								<li class="hamburger-menu__item">
									<a href="<?php echo($prefix . '/register'); ?>" class="hamburger-menu__content link link_type_sign-up"><?php echo _('Регистрация'); ?></a>
								</li>

								<li class="hamburger-menu__item">
									<div class="hamburger-menu__content js-contacts__phone-dropdown phone-dropdown link link_type_sort-down"><?php echo _('Контакты'); ?></div>
									<div class="js-contacts__phone-dropdown phone-dropdown__container">
										<ul class="phone-dropdown__list">
											<li class="phone-dropdown__item"><a class="phone-dropdown__content link link_type_pnone" href="tel:+380567931921">+38 (056)-793-19-21</a></li>
											<li class="phone-dropdown__item"><a class="phone-dropdown__content link link_type_pnone" href="tel:+380567932821">+38 (056)-793-38-21</a></li>
											<li class="phone-dropdown__item"><a class="phone-dropdown__content link link_type_mail" href="mailto:contact@Ticket.xyz">contact@Ticket.xyz</a></li>
										</ul>
									</div>

								</li>
								
								<li class="hamburger-menu__item">
									<div class="hamburger-menu__content js-language__phone-dropdown phone-dropdown link link_type_sort-down"><?php echo _('Язык'); ?></div>
								
									<div class="js-contacts__phone-dropdown phone-dropdown__container">
										<ul class="phone-dropdown__list">
											<li class="phone-dropdown__item"><a class="phone-dropdown__content link" href="<?php if($lang !== 'ru'){echo(substr($_SERVER['REQUEST_URI'], 3));}; ?>">[RU] Русский</a></li>
											<li class="phone-dropdown__item"><a class="phone-dropdown__content link" href="<?php if($lang == 'ru'){echo('/uk' . $_SERVER['REQUEST_URI']);}else{echo('/uk' . substr($_SERVER['REQUEST_URI'], 3));}; ?>">[UK] Українська</a></li>
											<li class="phone-dropdown__item"><a class="phone-dropdown__content link" href="<?php if($lang == 'ru'){echo('/en' . $_SERVER['REQUEST_URI']);}else{echo('/en' . substr($_SERVER['REQUEST_URI'], 3));}; ?>">[EN] English</a></li>		
										</ul>
									</div>

								</li>

							</ul>
						</div>
					</div>
				</div>

			</header>

			<div class="seo-text">
				<div class="seo-text__wrapper">
					<div class="seo-text__container">
						<div class="seo-text__text seo-text__text_heading"><?php echo _('Ticket.xyz — национальный билетный оператор, продающий билеты на автобусные маршруты абсолютно любых направлений'); ?></div>
						<div class="seo-text__text"><?php echo _('Наша сила в системности и научном подходе: все бизнес-процессы мы прорабатываем достаточно осмысленно и глубоко. Ticket.xyz — большая компания, которая драйвит и развивает рынок. Мы первыми в своей отрасли внедрили технологию электронных билетов по всей стране, выстроили инновационную бизнес модель и создали самую большую дистрибьюторскую сеть. Ежедневно мы усовершенствуем наш сервис, делая его лучше для клиентов, тем самым добиваясь вашего доверия.'); ?></div>
						<div class="seo-text__text seo-text__text_bold"><?php echo _('Ваше доверие это та награда которую мы ценим больше всего!'); ?></div>
						<div class="seo-text__text"><?php echo _('В основе работы Ticket.xyz лежит философия ответственного лидерства. Если мы беремся за что-то, то делаем это серьезно, по настоящему, с большим запасом прочности. Ответственное лидерство - это когда твои действия влияют и значительно улучшают работу всей отрасли. Мы всегда думаем о рынке в целом и шаг за шагом фундаментально меняем его ландшафт в лучшую сторону.'); ?></div>
						<div class="seo-text__text"><?php echo _('Мы благодарны, что с 2010 года вы покупаете официальные билеты на сайте Ticket.xyz и в наших касах.'); ?></div>
						<div class="seo-text__text"><?php echo _('Вся наша деятельность направлена на ваш комфорт и безопасность.'); ?></div>
					</div>
				</div>
			</div>

		</div>

		<footer class="footer">
			<div class="footer__wrapper">
				<div class="footer__container">
					<div class="footer__logos">
						<div class="footer__logo logo">
							<a class="logo__link" <?php if($_SERVER['REQUEST_URI'] !== "$prefix/") { echo("href=\"$prefix/\"");}; ?>>
								<img class="logo__img" src="/images/dest/logo-2.png" alt="Tiket">
							</a>
						</div>
						<div class="footer__social social">
							<div class="social__item"><a href="https://www.facebook.com/" title="facebook" class="social__link social__link_fb"></a></div>
							<div class="social__item"><a href="https://telegram.org/" title="telegram" class="social__link social__link_tg"></a></div>
							<div class="social__item"><a href="https://twitter.com/" title="twitter" class="social__link social__link_tw"></a></div>
							<div class="social__item"><a href="https://www.instagram.com/" title="instagram" class="social__link social__link_inst"></a></div>
						</div>
					</div>
					<div class="footer__info info">
						<div class="info__item info__item_heading"><?php echo _('Информация'); ?></div>
						<div class="info__item"><a class="info__link" href="<?php echo("$prefix/about_company") ?>"><?php echo _('О нас'); ?></a></div>
						<div class="info__item"><a class="info__link" href="<?php echo("$prefix/contract_offer") ?>"><?php echo _('Договор оферты'); ?></a></div>
						<div class="info__item"><a class="info__link" href="<?php echo("$prefix/about_developer") ?>"><?php echo _('О разработчике'); ?></a></div>
					</div>
					<div class="footer__contacts footer-contacts">
						<div class="footer-contacts__item footer-contacts__item_heading"><?php echo _('Контакты'); ?></div>
						<div class="footer-contacts__item"><a class="footer-contacts__link" href="tel:+380567931921">+38 (056) 793-19-21</a></div>
						<div class="footer-contacts__item"><a class="footer-contacts__link" href="tel:+380567933821">+38 (056) 793-38-21</a></div>
						<div class="footer-contacts__item"><a class="footer-contacts__link" href="mailto:contact@Ticket.xyz">contact@Ticket.xyz</a></div>
					</div>

					<div class="footer__social footer__social_mobile social">
						<div class="social__item"><a href="https://www.facebook.com/" class="social__link social__link_fb"></a></div>
						<div class="social__item"><a href="https://telegram.org/" class="social__link social__link_tg"></a></div>
						<div class="social__item"><a href="https://twitter.com/" class="social__link social__link_tw"></a></div>
						<div class="social__item"><a href="https://www.instagram.com/" class="social__link social__link_inst"></a></div>
					</div>

					<div class="footer__payment payment">
						<div class="payment__item"><img class="payment__image" src="/images/dest/mastercard.svg" alt="mastercard"></div>
						<div class="payment__item"><img class="payment__image" src="/images/dest/maestro.svg" alt="maestro"></div>
						<div class="payment__item"><img class="payment__image" src="/images/dest/visa.svg" alt="visa"></div>
					</div>
					<div class="footer__copyright">©2010-2020, Ticket.xyz</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- <script src="/libs/jquery/dist/jquery.min.js"></script> -->
	<!-- <script src="/libs/air-datepicker/dist/js/datepicker.min.js"></script> -->
	<script src="/js/app.min.js"></script>
</body>
</html>