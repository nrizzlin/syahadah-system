<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MualafController extends Controller
{
    public function index()
    {
        // Retrieve journals for the logged-in Daie
        $mualafUsers = User::where('usertype', 'mualaf')->paginate(5);
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
        return view('ManageMualaf.create', compact('mualafUsers','countries'));
    }

    public function Mualaflist()
    {
        // Retrieve journals for the logged-in Daie
        $mualafUsers = User::where('usertype', 'mualaf')->paginate(2);
        return view('ManageMualaf.list', compact('mualafUsers'));
    }

    public function store(Request $request)
    {
        // Validate and store the new journal entry
        User::create($request->all());
        
        Alert::success('Congrats','You have Added the data Successfully');

        return redirect()->back()->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
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
        return view('ManageMualaf.edit', compact('users','countries'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->update($request->all());
        Alert::success('Congrats','You have Updated the data Successfully');

        return redirect()->route('mualaf.index')->with('success', 'User updated successfully');
    }

    public function view($id)
    {
        $users = User::findOrFail($id);
        return view('ManageMualaf.view_user', compact('users'));
    }

    public function viewlist($id)
    {
        $users = User::findOrFail($id);
        return view('ManageMualaf.view_list', compact('users'));
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('success', 'Journal deleted successfully');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Check if there is a search query
        if ($search) {
            $mualafUsers = User::where('usertype', 'mualaf')
            ->where('name', 'like', "%$search%")
            ->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $mualafUsers = User::where('usertype', 'mualaf')->paginate(5);
        }

        return view('ManageMualaf.create', compact('mualafUsers'));
    }

}
