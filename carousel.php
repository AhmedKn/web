<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link rel="stylesheet" href="./styles/carousel.css">
</head>
<body>
    <div class="like-body">
    <div class="app">
        <div class="cardList">
            <button class="cardList__btn btn btn--left">
                <svg>
                    <use xlink:href="#arrow-left"></use>
                </svg>
            </button>
            <div class="cards__wrapper">
                <div class="card current--card">
                    <div class="card__img">
                        <img src="./assets/razer.png" alt="">
                    </div>
                </div>
                <div class="card next--card">
                    <div class="card__img">
                        <img src="./assets/msi.png" alt="">
                    </div>
                </div>
                <div class="card previous--card">
                    <div class="card__img">
                        <img src="./assets/redragong.png" alt="">
                    </div>
                </div>
            </div>
            <button class="cardList__btn btn btn--right">
                <svg>
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </button>
        </div>
        <div class="infoList">
            <div class="info__wrapper">
                <div class="info current--info">
                    <h1 class="text name">Razer</h1>
                    <h4 class="text location">Thresher 7.1</h4>
                    <p class="text description">599TND</p>
                </div>
                <div class="info next--info">
                    <h1 class="text name">MSI</h1>
                    <h4 class="text location">Vigor Gk80 cs</h4>
                    <p class="text description">299TND</p>
                </div>
                <div class="info previous--info">
                    <h1 class="text name">Redragon</h1>
                    <h4 class="text location">MIRROR Incurvée 144Hz</h4>
                    <p class="text description">799TND</p>
                </div>
            </div>
        </div>
        <div class="app__bg">
            <div class="app__bg__image current--image">
                <img src="./assets/msi.png" alt="">
            </div>
            <div class="app__bg__image next--image">
                <img src="./assets/msi.png" alt="">
            </div>
            <div class="app__bg__image previous--image">
                <img src="./assets/redragong.png" alt="">
            </div>
        </div>
    </div>
    <div class="loading__wrapper">
        <div class="loader--text">Loading...</div>
        <div class="loader">
            <span></span>
        </div>
    </div>

<svg class="icons" style="display: none;">
	<symbol id="arrow-left" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
		<polyline points='328 112 184 256 328 400'
					 style='fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
	</symbol>
	<symbol id="arrow-right" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
		<polyline points='184 112 328 256 184 400'
					 style='fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
	</symbol>
</svg>
    </div>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.3/gsap.min.js"></script>
    <script src="./scripts/carousel.js"></script>
</body>
</html>