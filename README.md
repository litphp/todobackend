LitPHP
------

> Flexible component collection for modern application

[LitPHP Home](http://litphp.github.io/)

This branch demostrates roadrunner integration. Check [diff](https://github.com/litphp/todobackend/compare/cookbook/roadrunner)

--------------

A demo todobackend implementation

1. copy `configuration.dist.php` to `configuration.php`, change it's content (if you're sure what you are doing)

  + if you changed db connection detail, make sure also change it in `phinx.yml`

2. run `modd`

  + [modd](https://github.com/cortesi/modd) and [devd](https://github.com/cortesi/devd) are great tools to watch & restart daemon or run test for any tech stack
  + if you're impattient & using mac, just run `brew install modd devd` beforehand

3. browse <http://devd.io:6080/specs/index.html?/api/>, you should see all the specs passed
