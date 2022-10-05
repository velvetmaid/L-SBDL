let movies = [{
        year: 1998,
        title: 'A movie'
    },
    {
        year: 2011,
        title: 'Captian America'
    },
    {
        year: 2005,
        title: 'Toy Story 2'
    },
    {
        year: 2006,
        title: 'B movie'
    }
]

function sortByTitle(a, b) {
    var uppercase_a = a.title.toUpperCase();
    var uppercase_b = b.title.toUpperCase();
    return (uppercase_a > uppercase_b) ? 1 : -1
}

function sortByYear(a, b) {
    return (a.year > b.year) ? 1 : -1
}

function sortOnClick() {
    let title = true;

    if (title) {
        movies = movies.sort((a, b) => sortByTitle(a, b))
    } else {
        movies = movies.sort((a, b) => sortByYear(a, b))
    }
    console.log(movies)
}