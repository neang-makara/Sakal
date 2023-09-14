@extends('frontend.master')

@section('title', 'Show Data')

@section('content')

 <table>
    <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Skills</th>
    </tr>


    @if (count($showSkill) > 0)

        @foreach ($showSkill as $showSkills)
        <tr>
            <td>{{$showSkills->id}}</td>
            <td>{{$showSkills->skills_name}}</td>
            <td>
                @php
                    $skills_subject = json_decode($showSkills->skills_subject)
                @endphp
                @foreach ($skills_subject as $subject)
                    {{$subject}},
                @endforeach

            </td>
        </tr>

        @endforeach

    @else
        <tr>
            <td colspan="3">Skill not found</td>
        </tr>

    @endif


 </table>

 @endsection
