PHPGamification
===============

Forked from [jfuentesa/gamification](https://github.com/jfuentesa/gengamification)

PHPGamification are a Generic Gamification PHP Framework that clains to be simple and objective.

Sample code:

```php
/** Instantiate **/
$gamification = new PHPGamification::getInstance();
$gamification->setDAO(new DAO('my_host', 'my_databse', 'my_user', 'my_pass'));

/** Badges definitions */
$gamification->addBadge('newbee', 'Newbee', 'You logged in, congratulations!', 'img/badge1.png');
$gamification->addBadge('addict', 'Addict', 'You have logged in 10 times', 'img/badge1.png');
$gamification->addBadge('professional_writer', 'Professional Writer', 'You must write a book! 50 posts!!', 'img/badge3.png');

/** Levels definitions */
$gamification->addLevel(0, 'No Star');
$gamification->addLevel(1000, 'Five stars', 'grant_five_stars_badge');// Execute event: grant_five_stars_badge
$gamification->addLevel(2000, '2K points!');

/** Events definitions */

// Welcome to our network! (disallow reachRequiredRepetitions)
$event = new Event();
$event->setAlias('join_network')
    ->setEachPointsGranted(10)
    ->setAllowRepetitions(false); // Just one time
$gamification->addEvent($event);

// Each Login/Logged in 10 times (25 points each time, 50 points when reach 10 times)
$event = new Event();
$event->setAlias('login')
    ->setEachPointsGranted(25)
    ->setEachBadgeGranted($gamification->getBadgeByAlias('newbee'))
    ->setReachRequiredRepetitions(10)
    ->setReachPointsGranted(50)
    ->setReachBadgeGranted($gamification->getBadgeByAlias('addict'));
$gamification->addEvent($event);

// Each post to blog/You wrote 5 post to your blog (100 points each + badge, 1000 points reach)
$event = new Event();
$event->setAlias('post_to_blog')
    ->setEachPointsGranted(150)
    ->setEachCallback("MyOtherClass::myPostToBlogCallBackFunction")
    ->setReachRequiredRepetitions(50)
    ->setReachBadgeGranted($gamification->getBadgeByAlias('professional_writer'));
$gamification->addEvent($event);

/** Using it */

$gamification->setUserId(1);
$gamification->executeEvent('join_network');
$gamification->executeEvent('login');
   for ($i=0; $i<9; $i++)
        $gamification->executeEvent('login');
$gamification->executeEvent('post_to_blog', array('YourPostId'=>11));

/** Getting user data */
echo "<pre>";
var_dump($gamification->getUserScores());
var_dump($badges = $gamification->getUserBadges());
var_dump($log = $gamification->showUserLog());
var_dump($events = $gamification->getUserEvents());
echo "</pre>";
```

Use your own user database: call $gamification->setUserId($youtUserId) and keep going
You can set your own DAO: implement DAOInterface and set your instance with $gamification->setDAO()

= Event =

Level
Badge
Points

 Each: occurs every time a event is called
 Reach: occurs only when reachRequiredRepetitions reach the required reachRequiredRepetitions

 - points:
    each event: setEachPointsGranted
    when reach required reachRequiredRepetitions: setReachBadgeGranted
 - badges
    each event: setEachBadgeGranted
    when reach required reachRequiredRepetitions: setReachBadgeGranted

 - Event
 - Badge
 - Repetition Complete

 - Repetitions
 - Callback (each, event completion) (must return true)

setAllowRepetitions: force to happen just one time (1)