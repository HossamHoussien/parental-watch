@extends('parent.layouts.master')

@section('content')
<div class="main my-0 nannies-search">
    <div class="row mx-3 align-items-start">


        <div class="w-20 bg-white p-3 mt-3">

            <form class="filter needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="gender" class="bold">Gender</label>

                        <select id="gender" class="custom-select">
                            <option selected disabled>Filter by gender</option>
                            <option value="all">Any</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="age" class="bold">Age</label>
                        <select id="age" class="custom-select">
                            <option selected disabled min="18" max="99">Filter by age</option>
                            <option value="all" min="18" max="99">Any</option>
                            <option value="range1" min="18" max="30">18-30</option>
                            <option value="range2" min="31" max="45">31-45</option>
                            <option value="range3" min="46" max="99">46-99</option>
                        </select>

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="city" class="bold">City</label>
                        <select id="city" class="custom-select">
                            <option selected disabled>Filter by city</option>
                            <option value="all">Any</option>
                            @foreach ($cities as $city)
                            <option value="{{ strtolower($city) }}">{{ $city }}</option>
                            @endforeach
                        </select>


                    </div>

                </div>

                <button type="submit" class="btn btn-primary float-right">Filter</button>
            </form>
        </div>

        <div class="nannies-container w-80 px-3">
            @each('parent.search.nanny-card', $nannies, 'nanny')
        </div>

    </div>
</div>

@push('js')
<script>
    $('.nannies-search .filter').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();

        $('.nanny-card').fadeOut('fast');
        let gender = $(this).find('#gender').val();
        let minAge = $('#age').children("option:selected").attr('min');
        let maxAge = $('#age').children("option:selected").attr('max');
        let city = $(this).find('#city').val();


        let genderQuery = (gender == 'all' || !gender) ? '' : `[gender=${gender}]`;
        let cityQuery = (city == 'all' || !city) ? '' : `[city=${city}]`;
        let searchQuery = `.nanny-card${genderQuery}${cityQuery}`;


        let matched = $(searchQuery);
        $('.nannies-container').find('.empty-result-set').remove();

        if (ageMatchedElementsCount(matched, minAge, maxAge) == 0) {
            $('.nannies-container').append(`<div class="empty-result-set text-center text-danger p-5 bg-white my-3 bold">
                No results found
            </div>`)
        }
        matched.each((_, e) => {
            let age = parseInt($(e).attr('age'));
            if (age >= minAge && age <= maxAge) {
                $(e).fadeIn('fast');
            }
        });


    });

    function ageMatchedElementsCount(elements, minAge, maxAge) {
        let count = 0;

        elements.each((_, e) => {
            let age = parseInt($(e).attr('age'));
            if (age >= minAge && age <= maxAge) {
                count++;
            }
        });
        return count;
    }

</script>
@endpush
@endsection
