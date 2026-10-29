<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CityServiceController extends Controller
{
    private const CITIES = [
        'laptop-repairing-in-agra' => [
            'city' => 'Agra',
            'region' => 'Uttar Pradesh',
            'intro' => 'Visit our laptop repair shop at Sanjay Place, Agra for laptop, MacBook and desktop diagnosis, or call to check home-visit availability anywhere in Agra.',
            'local_note' => 'Our workshop is located at 39/G-106, Sky Tower, Sanjay Place, Agra 282002. Walk-in and pre-confirmed doorstep support options are available.',
            'service_mode' => 'Workshop repairs and call-confirmed home or office visits across Agra.',
            'title' => 'Laptop Repair Shop in Sanjay Place, Agra | Pravesh',
            'meta' => 'Walk-in laptop repair at Sanjay Place, Agra: screens, motherboards, keyboards, charging faults, Windows and SSD upgrades. Call before you visit.',
            'distance' => 'Our workshop is in Sanjay Place, in the centre of Agra.',
            'context' => 'Pravesh Computer Services is a laptop repairing shop and computer repair centre in Agra. Sanjay Place is one of Agra\'s main commercial areas, which makes our workshop easy to reach from the city centre, Sadar Bazaar and the main roads towards Kamla Nagar and Sikandra. Students, offices and families can bring a laptop in directly, or call first to check whether a home or office visit is possible.',
            'issues' => 'In Agra we see everyday faults such as laptops that overheat in summer, batteries that no longer hold charge, cracked screens, keyboard failures and slow systems that need an SSD or a clean Windows install. Describe the symptom on a call and we will tell you what to expect before you come.',
            'areas' => ['Sanjay Place', 'Sadar Bazaar', 'Kamla Nagar', 'Sikandra', 'Taj Ganj', 'Dayalbagh', 'Shahganj', 'Bodla'],
            'faqs' => [
                ['Which areas of Agra do you cover?', 'From our Sanjay Place shop we support customers across Agra, including Sanjay Place, Sadar Bazaar, Kamla Nagar, Sikandra, Taj Ganj, Dayalbagh, Shahganj and Bodla. Call to confirm home-visit availability for your locality.'],
                ['Where exactly is your laptop repair shop in Agra?', 'Pravesh Computer Services is at 39/G-106, Sky Tower, Sanjay Place, Agra, Uttar Pradesh 282002. You can walk in, or call first so we can prepare for your device.'],
            ],
        ],
        'laptop-repairing-in-mathura' => [
            'city' => 'Mathura',
            'region' => 'Uttar Pradesh',
            'intro' => 'Need help with a slow, damaged or non-working laptop in Mathura? Speak with our team to discuss the fault and confirm the most suitable service option.',
            'local_note' => 'Customers in Mathura can share device details by phone or complaint form before travelling. We will explain whether the system should be brought to our Agra workshop or whether another service option is available.',
            'service_mode' => 'Advance diagnosis discussion and service availability confirmation for Mathura customers.',
            'title' => 'Laptop Repair in Mathura – Pravesh Computer Services',
            'meta' => 'Laptop repair help for Mathura and Vrindavan: our Agra workshop is about an hour away. Call or WhatsApp the fault first, then decide whether to travel.',
            'distance' => 'Mathura is roughly 58 km from our Agra workshop, around an hour by road.',
            'context' => 'Mathura is roughly 58 km from our Agra workshop, around an hour by road on the Agra–Delhi route. If you are in Mathura, Vrindavan or nearby, the simplest first step is to send us the laptop brand, model and fault by call or WhatsApp.',
            'issues' => 'Shops, coaching students and offices in Mathura usually need quick answers on screen damage, charging faults, slow Windows and data that has become inaccessible. We will tell you if the fault can be judged from your description or if the laptop needs to be inspected at the workshop.',
            'faqs' => [
                ['How far is your workshop from Mathura?', 'Our workshop at Sanjay Place, Agra is roughly 58 km from Mathura, usually about an hour by road. Call before travelling so we can confirm whether a visit is needed.'],
                ['Can customers from Vrindavan also get help?', 'Yes. Customers from Vrindavan and nearby areas can call or register the fault online, and we will confirm the service option in the same way.'],
            ],
        ],
        'laptop-repairing-in-firozabad' => [
            'city' => 'Firozabad',
            'region' => 'Uttar Pradesh',
            'intro' => 'For laptop screens, charging faults, Windows problems and desktop issues in Firozabad, contact our technicians for clear guidance and repair availability.',
            'local_note' => 'Before bringing a device from Firozabad, call or register the issue online. This helps us understand the symptoms, possible parts requirement and appropriate next step.',
            'service_mode' => 'Pre-confirmed laptop and computer repair assistance for customers from Firozabad.',
            'title' => 'Laptop Repair in Firozabad – Pravesh Computer Services',
            'meta' => 'Laptop and desktop repair help for Firozabad: workshop in Agra about 42 km away. Describe the fault by call first to avoid an unnecessary trip.',
            'distance' => 'Firozabad is roughly 42 km from our Agra workshop.',
            'context' => 'Firozabad is roughly 42 km from our Agra workshop, so a workshop visit is realistic for many faults. Share your device details by phone or the online form first so we can tell you whether the fault needs to be inspected in person.',
            'issues' => 'Small businesses and workshops in Firozabad often depend on one or two desktops for billing and records, so power faults, slow systems and Windows errors can stop work. Describe the issue and we will explain the likely cause and the practical repair route.',
            'faqs' => [
                ['How far is Firozabad from your Agra workshop?', 'Firozabad is roughly 42 km from our Sanjay Place workshop in Agra. Call first and we will confirm whether the fault needs to be brought in.'],
                ['Do you help shops and small offices in Firozabad with desktop problems?', 'Yes. We handle desktop and laptop hardware faults, Windows and software problems for homes, shops and small offices. Call to discuss the issue and availability.'],
            ],
        ],
        'laptop-repairing-in-bharatpur' => [
            'city' => 'Bharatpur',
            'region' => 'Rajasthan',
            'intro' => 'Looking for practical laptop or computer repair support in Bharatpur? Tell us the device problem and receive guidance on diagnosis and service availability.',
            'local_note' => 'Bharatpur customers are encouraged to call first with the laptop model and fault details. Our team can then advise whether workshop inspection is required.',
            'service_mode' => 'Call-first repair guidance and workshop service coordination for Bharatpur customers.',
            'title' => 'Laptop Repair in Bharatpur – Pravesh Computer Services',
            'meta' => 'Laptop repair help for Bharatpur, Rajasthan: our Agra workshop is about 55 km away. Share the model and fault by call first to plan the next step.',
            'distance' => 'Bharatpur, Rajasthan is roughly 55 km from our Agra workshop.',
            'context' => 'Bharatpur is in Rajasthan, roughly 55 km from our Agra workshop in Uttar Pradesh. Because it involves a state border and a longer trip, we recommend sharing the laptop model and fault by call first so you can decide whether the journey is worthwhile.',
            'issues' => 'Students, families and offices in Bharatpur most often ask about screens, batteries, overheating and slow performance. Many of these can be narrowed down over a call, which can save a trip before the laptop is inspected.',
            'faqs' => [
                ['Do you help customers from Bharatpur in Rajasthan?', 'Yes. Customers from Bharatpur can call or register the fault online. Our workshop is in Agra, Uttar Pradesh, so we confirm the service route before you travel.'],
                ['How far is Bharatpur from your workshop?', 'Bharatpur is roughly 55 km from our Sanjay Place workshop in Agra. Share the model and fault first so we can tell you what to expect.'],
            ],
        ],
        'laptop-repairing-in-etmadpur' => [
            'city' => 'Etmadpur',
            'region' => 'Uttar Pradesh',
            'intro' => 'Get help with laptop hardware, software and performance issues in Etmadpur through Pravesh Computer Services. Call first to confirm support for your device.',
            'local_note' => 'For customers in Etmadpur, we can discuss the issue before inspection and confirm whether a workshop visit or a suitable pre-arranged service option is available.',
            'service_mode' => 'Laptop and desktop service coordination for Etmadpur with advance confirmation.',
            'title' => 'Laptop Repair in Etmadpur – Pravesh Computer Services',
            'meta' => 'Laptop repair for Etmadpur customers: our Agra workshop is a short drive away. Call first with the model and fault and we will confirm the next step.',
            'distance' => 'Etmadpur is roughly 23 km from our Agra workshop.',
            'context' => 'Etmadpur is only about 23 km from our Agra workshop, which makes a direct workshop visit the easiest option for most laptops. Call first so we can confirm the fault, the likely parts and what to bring.',
            'issues' => 'For customers around Etmadpur the common requests are charging problems, broken screens, keyboards, slow startup and Windows reinstalls. If you can bring the charger and describe when the fault started, diagnosis is faster.',
            'faqs' => [
                ['Is it practical to visit your Agra shop from Etmadpur?', 'Yes. Etmadpur is roughly 23 km from Sanjay Place, Agra, a short drive for most customers. Call first so we can confirm the fault and what to bring.'],
                ['Should I bring the charger with the laptop?', 'Yes, bring the original charger and any accessories. It helps us separate a charger or port fault from a battery or motherboard problem.'],
            ],
        ],
        'laptop-repairing-in-fatehabad' => [
            'city' => 'Fatehabad',
            'region' => 'Uttar Pradesh',
            'intro' => 'Laptop not starting, overheating or showing a damaged screen in Fatehabad? Contact us for a clear initial discussion and repair-service confirmation.',
            'local_note' => 'Share your device brand, model and symptoms before visiting from Fatehabad. We will help you understand the likely inspection process and available service route.',
            'service_mode' => 'Advance repair consultation and service coordination for Fatehabad customers.',
            'title' => 'Laptop Repair in Fatehabad – Pravesh Computer Services',
            'meta' => 'Laptop repair guidance for Fatehabad: Agra workshop about 37 km away. Send the brand, model and symptoms first and we will confirm the next step.',
            'distance' => 'Fatehabad is roughly 37 km from our Agra workshop.',
            'context' => 'Fatehabad is roughly 37 km from our Agra workshop. Before you travel, send the laptop brand, model and symptoms by call or the online form so we can tell you if the fault needs an in-person check.',
            'issues' => 'Laptops from Fatehabad and nearby villages often come in with power-cut related charging damage, overheating, broken hinges and slow storage. A short description lets us suggest whether a workshop visit is necessary.',
            'faqs' => [
                ['How far is Fatehabad from your Agra workshop?', 'Fatehabad is roughly 37 km from our Sanjay Place workshop in Agra. Call first so we can confirm whether a visit is needed.'],
                ['Can I send details before travelling from Fatehabad?', 'Yes. Share the brand, model and symptoms by call or the online complaint form and we will explain the likely inspection process.'],
            ],
        ],
        'laptop-repairing-in-hathras' => [
            'city' => 'Hathras',
            'region' => 'Uttar Pradesh',
            'intro' => 'For laptop motherboard, display, keyboard, Windows and performance problems in Hathras, contact our repair team and discuss the next step.',
            'local_note' => 'Hathras customers can register the fault online or call before bringing the device. Prior details help us prepare for the right type of diagnosis.',
            'service_mode' => 'Call-confirmed computer repair guidance and workshop coordination for Hathras customers.',
            'title' => 'Laptop Repair in Hathras – Pravesh Computer Services',
            'meta' => 'Laptop repair guidance for Hathras: Agra workshop about 70 km away. Share the model and fault by call first so you only travel when it is needed.',
            'distance' => 'Hathras is roughly 70 km from our Agra workshop.',
            'context' => 'Hathras is roughly 70 km from our Agra workshop, one of the longer trips among the areas we serve. Share the model and fault by call or WhatsApp first so we can say whether a workshop visit is really needed before you travel.',
            'issues' => 'Traders and families in Hathras commonly ask about motherboard faults, display problems, keyboard issues and slow Windows. For a longer trip it helps to confirm the likely repair and parts availability by phone before you set out.',
            'faqs' => [
                ['Is it worth travelling from Hathras to your Agra workshop?', 'Hathras is roughly 70 km away, so we recommend sharing the model and fault by call or WhatsApp first. We will tell you whether the laptop needs to be inspected in person.'],
                ['Can some problems be judged over the phone?', 'Often we can narrow down common faults such as charging problems or slow performance from a description, but a final diagnosis needs the device to be checked.'],
            ],
        ],
    ];

    public function show(string $cityServiceSlug): View
    {
        abort_unless(isset(self::CITIES[$cityServiceSlug]), 404);

        return view('Frontend.pages.city-service', [
            'cityData' => self::CITIES[$cityServiceSlug],
            'citySlug' => $cityServiceSlug,
            'cities' => self::CITIES,
        ]);
    }
}
