for creating pokemon please send post request to api/pokemon route with body
{
    name: string,
    image: file,
    form: {
        title: string
    },
    ability: {
        title_ru: string (in russian !important),
        title_en: string (in english !important),
        image: file
    },
    location: {
        country: string,
        city: string,
        street: string
    }
    
}
