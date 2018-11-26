<?php
/*
    dayswitch.php
        stores the switch statement for the day of weekl

    if it is today, show $today's coffee

    if day is passed via GET, show $day's coffee

    place a link to show today's coffee
*/

$today = "";

if (isset($_GET['day']))
{//if it is today, show $today's coffee
    $today=($_GET['day']);
    
}else{//if day is passed via GET, show $day's coffee
    $today=date('l');
}

switch($today){

	case 'Sunday':	
		$coffee = "Macchiato";
		$color = "#A36F4A";
		$colorName = "Strong Orange";
		$dailySnackSpecial = "orange scone";
		$pic = "macchiato.jpg";
		$alt = "Refreshing Macchiato";
		$shortDescription = "Relax on Sunday with a strong, yet very smooth espresso with a touch of steamed milk.";	
	break;
	
	case 'Monday':	
		$coffee = "Ristretto shot";
		$color = "#531903";
		$colorName = "slice of beet and cranberry bread";
		$dailySnackSpecial = "slice of beet and cranberry bread";
		$pic = "ristretto.jpg";
		$alt = "Fabulous crema on this Ristretto shot";
		$shortDescription = "Each shot pulled to perfection for the discriminating palate. Fabulous Crema. You'll find the espresso almost sweet.";	
	break;
        
	case 'Tuesday':	
		$coffee = "Americano";
		$color = "#8A7D72";
		$colorName = "Americano";
		$dailySnackSpecial = "chocolate brownie";
		$pic = "americano.jpg";
		$alt = "Deep rich americano";
		$shortDescription = "Almost an espresso, with a bit of tepid water to draw out the enjoyment!";	
	break;	
	
	case 'Wednesday':	
		$coffee = "Cafe au Lait";
		$color = "#A67B5B";
		$colorName = "French Beige";
		$dailySnackSpecial = "slice of banana creme pie";
		$pic = "cafeAuLait.jpg";
		$alt = "Cafe au lait in ceramic cup!";
		$shortDescription = "Smooth, yet powerful. Perfect for your mid week pick-up!";	
	break;


	case 'Thursday':
		$coffee = "French Press";
		$color = "#715041";
		$colorName = "Bismarck";
		$dailySnackSpecial = "slice of coffee cake";
		$pic = "frenchPress.jpg";
		$alt = "Glass french press full of coffee";
		$shortDescription = "Strong and pungent. You're passed hump day and one day to go. Kick it!";
	break;
	
	case 'Friday':	
		$coffee = "Affogato";
		$color = "#430F04";
		$colorName = "Rustic Red";
		$dailySnackSpecial = "rasberry crumble bar";
		$pic = "macchiato.jpg";
		$alt = "Affogato in a ceramic cup";	
		$shortDescription = "Vanilla gelato doused with a doppio espresso and spiced with a shot of amaretto.";
	break;
	
	case 'Saturday':	
		$coffee = "Chemex Pour Over";
		$color = "#0C0B10";
		$colorName = "Black Russian";
		$dailySnackSpecial = "a slice of dark chocolate molten cake";
		$pic = "chemex.jpg";
		$alt = "Chemex coffee maker on counter";
		$shortDescription = "Simple elegance. The shape of Chemex carafe and the special bonded filters achieve the highest standard for brewed coffee. Yes, it takes a little longer, and yes, it’s worth every second. Enjoy!!";	
	break;

    default:
        $coffee = "";
		$color = "";
		$colorName = "";
		$dailySnackSpecial = "";
		$pic = "";
		$alt = "";
		$shortDescription = "";
}
        
?>