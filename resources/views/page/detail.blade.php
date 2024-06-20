@extends('layouts.main')

@section('container')

<div class="row p-5" style="min-height: 90vh">
    <div class="detail-img col-lg-3 ">
        <img src="{{ $movie['bannerUrl'] }}" alt="" class="rounded w-100">
    </div>
    <div class="col-lg-8 text-light" style="margin-left: 20px;">
        <div class="detail row">
            <div class="col-lg-12 title-detail">
                <a href=""></a><h2>{{ $movie['title'] }}</h2>
            </div>
            <div class="col-lg-12">
                <div class="genre">
                    <span class="bg-grey">Genre</span>
                    
                    @foreach ($movie['genre'] as $genre)
                        {{ $genre }}
                        @if (!$loop->last)
                            ,
                        @endif                        
                    @endforeach
                </div>
            </div>

            <div class="col-lg-12 mt-2">
                <div class="rating inline">
                    <span>{{ $movie['rating'] }}</span>
                    <span class="mx-2">|</span>

                    <span class="duration">{{ $movie['duration'] }}</span>
                    <span class="mx-2">|</span>

                    <span>
                        <a class="trailer bg-gray text-decoration-none" href="{{ $movie['trailerUrl'] }}">
                            Play Trailer
                        </a>
                    </span>
                </div>
            </div>

            <div class="col-lg-12 mt-2">
                <div class="deskripsi">
                    {{ $movie['description'] }}
                </div>
            </div>

            <hr class="my-3">

            
            <div class="col-lg-6 mb-2">
                <div class="cast">
                    <h5>Cast</h5>
                    @foreach ($movie['cast'] as $cast)
                        {{ $cast }}
                        @if (!$loop->last)
                            ,
                        @endif                        
                    @endforeach
                </div>
            </div>

            
            <div class="col-lg-6 mb-2">
                <div class="producer">
                    <h5>Producer</h5>
                    @foreach ($movie['producer'] as $producer)
                        {{ $producer }}
                        @if (!$loop->last)
                            ,
                        @endif                        
                    @endforeach
                </div>
            </div>

            
            <div class="col-lg-6 my-2">
                <div class="writer">
                    <h5>Writer</h5>
                    @foreach ($movie['writer'] as $writer)
                        {{ $writer }}
                        @if (!$loop->last)
                            ,
                        @endif                        
                    @endforeach
                </div>
            </div>

            
            <div class="col-lg-6 my-2">
                <div class="director">
                    <h5>Director</h5>
                    @foreach ($movie['director'] as $director)
                        {{ $director }}
                        @if (!$loop->last)
                            ,
                        @endif                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection