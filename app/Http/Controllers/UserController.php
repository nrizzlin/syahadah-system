<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve journals for the logged-in Daie
        $users = User::paginate(5);

        // Array of countries
        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola',
            'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria',
            'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados',
            'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan',
            'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei',
            'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia',
            'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile',
            'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica',
            'Croatia', 'Cuba', 'Cyprus', 'Czechia', 'Denmark',
            'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt',
            'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini',
            'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon',
            'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece',
            'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana',
            'Haiti', 'Holy See', 'Honduras', 'Hungary', 'Iceland',
            'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland',
            'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan',
            'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South',
            'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia',
            'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein',
            'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia',
            'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania',
            'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco',
            'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar',
            'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand',
            'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway',
            'Oman', 'Pakistan', 'Palau', 'Palestine State', 'Panama',
            'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland',
            'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda',
            'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino',
            'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles',
            'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands',
            'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka',
            'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria',
            'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste',
            'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey',
            'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates',
            'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu',
            'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe',
        ];

        return view('ManageUser.create', compact('users','countries'));
    }

    public function ReportUser()
    {
        // Retrieve all users
        $usersD = User::paginate(5);
        $Totalusers = User::count();
        $Totalmentor = User::where('usertype','mentor')->count();
        $Totaldaie = User::where('usertype','daie')->count();
        $Totalmualaf = User::where('usertype','mentor')->count();

        return view('ManageUser.report', compact('Totalusers','usersD','Totalmentor','Totaldaie','Totalmualaf'));
    }

    public function store(Request $request)
    {
        // Validate and store the new journal entry
        User::create($request->all());

        return redirect()->back()->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        // Array of countries
        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola',
            'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria',
            'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados',
            'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan',
            'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei',
            'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia',
            'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile',
            'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica',
            'Croatia', 'Cuba', 'Cyprus', 'Czechia', 'Denmark',
            'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt',
            'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini',
            'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon',
            'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece',
            'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana',
            'Haiti', 'Holy See', 'Honduras', 'Hungary', 'Iceland',
            'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland',
            'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan',
            'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South',
            'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia',
            'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein',
            'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia',
            'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania',
            'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco',
            'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar',
            'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand',
            'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway',
            'Oman', 'Pakistan', 'Palau', 'Palestine State', 'Panama',
            'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland',
            'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda',
            'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino',
            'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles',
            'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands',
            'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka',
            'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria',
            'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste',
            'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey',
            'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates',
            'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu',
            'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe',
        ];

        return view('ManageUser.edit', compact('users', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->update($request->all());

        return redirect()->route('list_users')->with('success', 'User updated successfully');
    }

    public function view($id)
    {
        $users = User::findOrFail($id);
        return view('ManageUser.view_user', compact('users'));
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('success', 'Journal deleted successfully');
    }

    public function search(Request $request)
{
    // $search = $request->input('search');
    // $users = User::where('name', 'like', "%$search%")->get();

    $search = $request->input('search');

    // Check if there is a search query
    if ($search) {
        $users = User::where('name', 'like', "%$search%")->paginate(5);
    } else {
        // If there's no search query, retrieve all users with pagination
        $users = User::paginate(5);
    }

    $countries = [
        'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola',
        'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria',
        'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados',
        'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan',
        'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei',
        'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia',
        'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile',
        'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica',
        'Croatia', 'Cuba', 'Cyprus', 'Czechia', 'Denmark',
        'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt',
        'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini',
        'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon',
        'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece',
        'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana',
        'Haiti', 'Holy See', 'Honduras', 'Hungary', 'Iceland',
        'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland',
        'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan',
        'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South',
        'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia',
        'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein',
        'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia',
        'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania',
        'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco',
        'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar',
        'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand',
        'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway',
        'Oman', 'Pakistan', 'Palau', 'Palestine State', 'Panama',
        'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland',
        'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda',
        'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino',
        'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles',
        'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands',
        'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka',
        'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria',
        'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste',
        'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey',
        'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates',
        'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu',
        'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe',
    ];

    return view('ManageUser.create', compact('users', 'countries'));
}

public function searchData(Request $request)
{
    $search = $request->input('search');


    // Check if there is a search query
    if ($search) {
        $usersD = User::where('name', 'like', "%$search%")->paginate(5);
    } else {
        // If there's no search query, retrieve all users with pagination
        $usersD = User::paginate(5);
    }

    $Totalusers = User::count();
    $Totalmentor = User::where('usertype','mentor')->count();
    $Totaldaie = User::where('usertype','daie')->count();
    $Totalmualaf = User::where('usertype','mentor')->count();

    return view('ManageUser.report', compact('Totalusers','usersD','Totalmentor','Totaldaie','Totalmualaf'));
}
    
}
