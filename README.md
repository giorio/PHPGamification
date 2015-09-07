PHPGamification
===============

PHPGamification are a Generic Gamification PHP Framework that clains to be simple and objective.

Forked from [jfuentesa/gamification](https://github.com/jfuentesa/gengamification)
# Features

* Handle Points, Levels and Bagdes
* Allow use your own Callbacks when user receive Points or Badges
* Use your own user database: call $gamification->setUserId($youtUserId) and keep going


# Sample code

```php
/** Instantiate **/
$gamification = new PHPGamification::getInstance();
$gamification->setDAO(new DAO('my_host', 'my_databse', 'my_user', 'my_pass'));

/** Badges definitions */
$gamification->addBadge('newbee', 'Newbee', 'You logged in, congratulations!');
$gamification->addBadge('addict', 'Addict', 'You have logged in 10 times');
$gamification->addBadge('professional_writer', 'Professional Writer', 'You must write a book! 50 posts!!');

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
var_dump($gamification->getUserAllData());
echo "</pre>";
```

# Using

## Setup your gamification rules

### Levels and badges

Just tell what levels and badges have your game.

### Events

A event may occur a just time or many times. When creating a event you can setup Points and Badge to be granted **each** time it occurs and/or when user **reach** the required repetitions.

* Each: occurs every time a event is called
* Reach: occurs only when reachRequiredRepetitions reach the required reachRequiredRepetitions

 - points:
    each event: setEachPointsGranted
    when reach required reachRequiredRepetitions: setReachBadgeGranted
 - badges
    each event: setEachBadgeGranted
    when reach required reachRequiredRepetitions: setReachBadgeGranted

## Running your gamification executing Events

Every time you want to something happen in your gamification enviroment, you must execute a event calling:

```php
    $gamification->executeEvent('login',array('more_data'=>'to_your_callback'));
```

All information you can need about the some user can be retrieved calling getUserScores(), getUserBadges(), showUserLog() and getUserEvents(), or $gamification->getUserAllData() to return all togheter.

 - Repetitions
 - Callback (each, event completion) (must return true)


## Keep your users engajed

Take advantage of events callback to send emails to user user when some great happend, like, win a new badge or growing by the levels.

# Some more

 * You can set your own DAO: implement DAOInterface and set your instance with $gamification->setDAO()

# Todo

* Allow Callbacks when your conquest a new level (Move ReachCallback to badge and level?)

# Contact

Tiago Gouvêa
[Blog](http://www.tiagogouvea.com.br) [Twitter](https://twitter.com/TiagoGouvea) [Facebook](https://www.facebook.com/tiagogouvea)

