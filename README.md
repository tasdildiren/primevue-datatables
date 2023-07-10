# Laravel + PrimeVue Datatables

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tasdildiren/primevue-datatables.svg?style=flat-square)](https://packagist.org/packages/tasdildiren/primevue-datatables)
[![Total Downloads](https://img.shields.io/packagist/dt/tasdildiren/primevue-datatables.svg?style=flat-square)](https://packagist.org/packages/tasdildiren/primevue-datatables)
![GitHub Actions](https://github.com/tasdildiren/primevue-datatables/actions/workflows/main.yml/badge.svg)

This is a simple, clean and fluent serve-side implementation of [PrimeVue Datatables](https://primefaces.org/primevue/showcase/#/datatable) in [Laravel](https://laravel.com/).

![image](https://user-images.githubusercontent.com/5610289/159969279-155b736d-a1fa-49c8-a34a-cccc775103a4.png)

## Features
- Global Search including searching in relationships up to a depth of 3, e.g `author.user.name`
- Per-Column filtering out of the box
- Column Sorting with direction toggling
- Pagination with a dynamic `no. or records per page` setting
- Fully compatible with PrimeVue Datatable

## Installation

You can install the package via composer:

```bash
composer require tasdildiren/primevue-datatables
```

## Usage

### Server Side
It is as simple as having this in your `index()` function of your controller:
```php
public function index(Request $request): JsonResponse
{
    $list = PrimevueDatatables::of(Book::query())->make();
    return response()->json($list);
}
```
#### Required Query Parameters
The server-side implementation uses two parameters from your laravel request object to perform filtering, sorting and pagination:
You have to pass the following parameters as query params from the client:
1. Searchable Columns **(Passed as `searchable_columns`)** - Used to specify the columns that will be used to perform the global datatable search
2. Dt Params **(Passed as `dt_params`)** - This is the main Datatable event object as received from PrimeVue. See [Lazy Datatable](https://primefaces.org/primevue/showcase/#/datatable/lazy) documentation for more details
### Client Side:
Go through [PrimeVue's Lazy Datatable](https://primefaces.org/primevue/showcase/#/datatable/lazy) documentation for details on frontend implementation.

Here is an example of your `loadLazyData()` implementation:

```ts
const loadLazyData = async () => {
    loading.value = true;

    try {
        const res = await axios.post('/api/books',{
            dt_params: lazyParams.value,
            searchable_columns: ['title','author.name','price'],
        });

        records.value = res.data.data;
        totalRecords.value = res.data.total;
        loading.value = false;
    } catch (e) {
        records.value = [];
        totalRecords.value = 0;
        loading.value = false;
    }
};
```
### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email maosa.sam@gmail.com instead of using the issue tracker.

## Credits

-   [Sam Maosa](https://github.com/tasdildirens)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
