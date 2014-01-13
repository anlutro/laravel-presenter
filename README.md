# Laravel 4 Presenter
Installation: `composer require anlutro/l4-presenter`

Pick the latest stable version from packagist or the GitHub tag list.

WARNING: Backwards compatibility is not guaranteed during version 0.x.

### Presenter
Extend the `\c\Presenter` class and add methods that start with 'present' to replace the default getters on the underlying object. For example, `presentFooBar` will be invoked when you try to get `$object->foo_bar`. If no present method is found, the get is simply passed on to the underlying object.

Use `MyPresenter::make($object)` to make it work on Collection objects - this wraps every item in the collection in a presenter and returns the modified collection.

If your class implements `\c\PresentableInterface`, this method will be invoked and determine what's returned from `\c\Presenter::make()`.

## Contact
Open an issue on GitHub if you have any problems or suggestions.

## License
The contents of this repository is released under the [MIT license](http://opensource.org/licenses/MIT).