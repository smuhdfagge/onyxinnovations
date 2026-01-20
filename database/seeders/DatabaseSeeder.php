<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Industry;
use App\Models\TeamMember;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\JobCategory;
use App\Models\JobListing;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@onyxinnovations.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Services (matches services migration)
        $services = [
            [
                'title' => 'Custom Software Development',
                'slug' => 'custom-software-development',
                'icon' => '💻',
                'short_description' => 'Tailored software solutions designed to address your unique business challenges and drive operational excellence.',
                'problem_statement' => 'Off-the-shelf software often fails to address unique business processes and requirements, leading to inefficiencies and workarounds.',
                'solution_approach' => 'We build custom software applications that perfectly align with your business processes and objectives using agile methodology.',
                'business_value' => 'Increased operational efficiency, reduced manual processes, and a competitive advantage through technology.',
                'use_cases' => "Enterprise resource planning systems\nCustom CRM solutions\nWorkflow automation tools\nData management platforms",
                'content' => '<p>We build custom software applications that perfectly align with your business processes and objectives. Our team of experienced developers uses the latest technologies and methodologies to deliver scalable, maintainable solutions.</p><h3>Our Approach</h3><p>We follow an agile development methodology, ensuring frequent delivery of working software and continuous collaboration with your team.</p>',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Cloud Solutions',
                'slug' => 'cloud-solutions',
                'icon' => '☁️',
                'short_description' => 'Comprehensive cloud services including migration, optimization, and managed cloud infrastructure.',
                'problem_statement' => 'Legacy infrastructure limits scalability, increases costs, and creates security vulnerabilities.',
                'solution_approach' => 'We help businesses migrate to the cloud, optimize their cloud spending, and manage their cloud environments effectively.',
                'business_value' => 'Reduced IT costs, improved scalability, enhanced disaster recovery, and global accessibility.',
                'use_cases' => "Cloud migration projects\nMulti-cloud architecture design\nCloud-native application development\nServerless computing solutions",
                'content' => '<p>Transform your IT infrastructure with our cloud solutions. We help businesses migrate to the cloud, optimize their cloud spending, and manage their cloud environments effectively.</p>',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Digital Transformation',
                'slug' => 'digital-transformation',
                'icon' => '🚀',
                'short_description' => 'End-to-end digital transformation services to modernize your business operations and customer experiences.',
                'problem_statement' => 'Organizations struggle to compete in the digital age with outdated processes and technologies.',
                'solution_approach' => 'We help organizations reimagine their processes, adopt new technologies, and create digital-first experiences.',
                'business_value' => 'Improved customer experience, operational efficiency, new revenue streams, and competitive positioning.',
                'use_cases' => "Business process automation\nLegacy system modernization\nDigital customer experience\nData-driven decision making",
                'content' => '<p>Embrace the digital future with our comprehensive transformation services. We help organizations reimagine their processes, adopt new technologies, and create digital-first experiences.</p>',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Data Analytics & AI',
                'slug' => 'data-analytics-ai',
                'icon' => '🤖',
                'short_description' => 'Unlock insights from your data with advanced analytics, machine learning, and AI-powered solutions.',
                'problem_statement' => 'Organizations collect vast amounts of data but struggle to extract actionable insights.',
                'solution_approach' => 'We implement advanced analytics and AI solutions that turn your data into strategic business assets.',
                'business_value' => 'Better decision-making, predictive capabilities, automated processes, and competitive intelligence.',
                'use_cases' => "Business intelligence dashboards\nPredictive analytics models\nNatural language processing\nComputer vision applications",
                'content' => '<p>Turn your data into a strategic asset. Our data analytics and AI services help you make better decisions, predict trends, and automate complex processes.</p>',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Cybersecurity Services',
                'slug' => 'cybersecurity-services',
                'icon' => '🔒',
                'short_description' => 'Protect your business with comprehensive security assessments, implementation, and managed security services.',
                'problem_statement' => 'Cyber threats are evolving rapidly, putting business data and operations at constant risk.',
                'solution_approach' => 'We provide end-to-end security solutions including assessments, implementation, and 24/7 monitoring.',
                'business_value' => 'Protected assets, regulatory compliance, customer trust, and business continuity.',
                'use_cases' => "Security assessments and audits\nPenetration testing\nSecurity operations center\nIncident response services",
                'content' => '<p>Safeguard your digital assets with our cybersecurity expertise. We provide end-to-end security solutions to protect your organization from evolving threats.</p>',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'IT Consulting',
                'slug' => 'it-consulting',
                'icon' => '📊',
                'short_description' => 'Strategic IT guidance to align technology investments with your business goals and maximize ROI.',
                'problem_statement' => 'Organizations struggle to make the right technology decisions that align with business objectives.',
                'solution_approach' => 'Our consultants work with you to develop IT roadmaps, select solutions, and implement best practices.',
                'business_value' => 'Aligned technology investments, reduced risk, optimized IT spending, and strategic advantage.',
                'use_cases' => "Technology roadmap development\nVendor selection and evaluation\nIT governance frameworks\nCost optimization strategies",
                'content' => '<p>Get expert advice on your technology strategy. Our consultants work with you to develop IT roadmaps, select the right solutions, and implement best practices.</p>',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['slug' => $service['slug']], $service);
        }

        // Create Industries (matches industries migration)
        $industries = [
            [
                'name' => 'Healthcare & Life Sciences',
                'slug' => 'healthcare-life-sciences',
                'icon' => '🏥',
                'short_description' => 'Digital health solutions, EMR systems, telemedicine platforms, and healthcare analytics for modern medical institutions.',
                'content' => '<p>We help healthcare organizations embrace digital innovation while maintaining compliance with regulatory requirements like HIPAA.</p>',
                'challenges' => "Regulatory compliance requirements\nData security and patient privacy\nInteroperability between systems\nPatient engagement and experience",
                'solutions' => "HIPAA-compliant cloud solutions\nEMR/EHR system integration\nTelemedicine platforms\nHealthcare analytics dashboards",
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Financial Services',
                'slug' => 'financial-services',
                'icon' => '🏦',
                'short_description' => 'Secure banking solutions, fintech applications, payment processing, and regulatory compliance systems.',
                'content' => '<p>We deliver secure, compliant technology solutions for banks, insurance companies, and fintech startups.</p>',
                'challenges' => "Regulatory compliance and reporting\nCybersecurity threats\nLegacy system modernization\nCustomer experience expectations",
                'solutions' => "Secure payment processing systems\nRegulatory compliance platforms\nDigital banking solutions\nFraud detection systems",
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Retail & E-commerce',
                'slug' => 'retail-ecommerce',
                'icon' => '🛒',
                'short_description' => 'Omnichannel retail solutions, inventory management, customer analytics, and seamless shopping experiences.',
                'content' => '<p>Transform your retail operations with digital solutions that enhance customer experiences and streamline operations.</p>',
                'challenges' => "Omnichannel integration\nInventory management complexity\nCustomer experience personalization\nSupply chain optimization",
                'solutions' => "E-commerce platform development\nInventory management systems\nCustomer analytics platforms\nOmnichannel integration solutions",
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'icon' => '🏭',
                'short_description' => 'Industry 4.0 solutions, IoT integration, supply chain optimization, and smart factory implementations.',
                'content' => '<p>Embrace smart manufacturing with our IoT, automation, and data analytics solutions designed for the factory floor.</p>',
                'challenges' => "Production efficiency optimization\nQuality control management\nSupply chain visibility\nPredictive maintenance needs",
                'solutions' => "IoT sensor integration\nPredictive maintenance systems\nSupply chain management platforms\nQuality control automation",
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Logistics & Transportation',
                'slug' => 'logistics-transportation',
                'icon' => '🚚',
                'short_description' => 'Fleet management, route optimization, warehouse automation, and real-time tracking solutions.',
                'content' => '<p>Optimize your logistics operations with intelligent routing, tracking, and warehouse management systems.</p>',
                'challenges' => "Fleet management complexity\nRoute optimization requirements\nReal-time visibility needs\nWarehouse efficiency",
                'solutions' => "Fleet management systems\nRoute optimization algorithms\nReal-time tracking platforms\nWarehouse automation solutions",
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Education & EdTech',
                'slug' => 'education-edtech',
                'icon' => '🎓',
                'short_description' => 'Learning management systems, virtual classrooms, student analytics, and educational content platforms.',
                'content' => '<p>Enable modern learning experiences with our education technology solutions for schools, universities, and training organizations.</p>',
                'challenges' => "Remote learning requirements\nStudent engagement challenges\nPerformance tracking needs\nContent delivery optimization",
                'solutions' => "Learning management systems\nVirtual classroom platforms\nStudent analytics dashboards\nContent management systems",
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($industries as $industry) {
            Industry::firstOrCreate(['slug' => $industry['slug']], $industry);
        }

        // Create Team Members (matches team_members migration)
        $teamMembers = [
            [
                'name' => 'Jonathan Mitchell',
                'slug' => 'jonathan-mitchell',
                'position' => 'Chief Executive Officer',
                'bio' => 'Jonathan brings over 20 years of experience in technology leadership, having previously served as CTO at Fortune 500 companies. He is passionate about using technology to solve complex business challenges.',
                'linkedin' => 'https://linkedin.com/in/jonathanmitchell',
                'is_leadership' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Sarah Chen',
                'slug' => 'sarah-chen',
                'position' => 'Chief Technology Officer',
                'bio' => 'Sarah is a visionary technologist with deep expertise in cloud architecture and AI/ML systems. She leads our technical strategy and innovation initiatives.',
                'linkedin' => 'https://linkedin.com/in/sarachen',
                'is_leadership' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Michael Roberts',
                'slug' => 'michael-roberts',
                'position' => 'Chief Operating Officer',
                'bio' => 'Michael oversees global operations and has a track record of scaling technology organizations. He ensures our delivery excellence and operational efficiency.',
                'linkedin' => 'https://linkedin.com/in/michaelroberts',
                'is_leadership' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Emily Thompson',
                'slug' => 'emily-thompson',
                'position' => 'Chief Financial Officer',
                'bio' => 'Emily brings extensive experience in financial management and strategic planning for technology companies. She manages our financial operations and investor relations.',
                'linkedin' => 'https://linkedin.com/in/emilythompson',
                'is_leadership' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($teamMembers as $member) {
            TeamMember::firstOrCreate(['slug' => $member['slug']], $member);
        }

        // Create Blog Categories (matches blog_categories migration)
        $blogCategories = [
            ['name' => 'Technology', 'slug' => 'technology', 'description' => 'Latest technology trends and insights', 'is_active' => true],
            ['name' => 'Cloud Computing', 'slug' => 'cloud-computing', 'description' => 'Cloud infrastructure and services', 'is_active' => true],
            ['name' => 'Artificial Intelligence', 'slug' => 'artificial-intelligence', 'description' => 'AI and machine learning insights', 'is_active' => true],
            ['name' => 'Cybersecurity', 'slug' => 'cybersecurity', 'description' => 'Security best practices and news', 'is_active' => true],
            ['name' => 'Digital Transformation', 'slug' => 'digital-transformation', 'description' => 'Digital transformation strategies', 'is_active' => true],
            ['name' => 'Company News', 'slug' => 'company-news', 'description' => 'Latest updates from Onyx Innovations', 'is_active' => true],
        ];

        foreach ($blogCategories as $category) {
            BlogCategory::firstOrCreate(['slug' => $category['slug']], $category);
        }

        // Create Job Categories (matches job_categories migration)
        $jobCategories = [
            ['name' => 'Engineering', 'slug' => 'engineering', 'is_active' => true],
            ['name' => 'Design', 'slug' => 'design', 'is_active' => true],
            ['name' => 'Product', 'slug' => 'product', 'is_active' => true],
            ['name' => 'Sales', 'slug' => 'sales', 'is_active' => true],
            ['name' => 'Marketing', 'slug' => 'marketing', 'is_active' => true],
            ['name' => 'Operations', 'slug' => 'operations', 'is_active' => true],
        ];

        foreach ($jobCategories as $category) {
            JobCategory::firstOrCreate(['slug' => $category['slug']], $category);
        }

        // Create Job Listings (matches job_listings migration)
        $jobs = [
            [
                'title' => 'Senior Full Stack Developer',
                'slug' => 'senior-full-stack-developer',
                'category_id' => 1,
                'location' => 'Remote',
                'employment_type' => 'full-time',
                'experience_level' => 'senior',
                'salary_range' => '$120,000 - $160,000',
                'short_description' => 'We are looking for an experienced Full Stack Developer to join our growing engineering team.',
                'description' => '<p>We are looking for an experienced Full Stack Developer to join our growing engineering team. You will work on challenging projects for our enterprise clients.</p>',
                'requirements' => "5+ years of experience in full stack development\nProficiency in React, Node.js, and cloud technologies\nStrong problem-solving skills\nExcellent communication abilities",
                'responsibilities' => "Design and implement scalable web applications\nCollaborate with cross-functional teams\nMentor junior developers\nParticipate in code reviews",
                'benefits' => "Competitive salary\nRemote work options\nHealth insurance\nProfessional development budget\n401(k) matching",
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Cloud Solutions Architect',
                'slug' => 'cloud-solutions-architect',
                'category_id' => 1,
                'location' => 'Hybrid - New York',
                'employment_type' => 'full-time',
                'experience_level' => 'senior',
                'salary_range' => '$150,000 - $200,000',
                'short_description' => 'Join our cloud team to design and implement enterprise-scale cloud solutions.',
                'description' => '<p>Join our cloud team to design and implement enterprise-scale cloud solutions. Lead cloud migration projects for Fortune 500 clients.</p>',
                'requirements' => "7+ years of experience in cloud architecture\nAWS/Azure/GCP certifications\nExperience with enterprise clients\nStrong presentation skills",
                'responsibilities' => "Design cloud architecture for enterprise clients\nLead cloud migration projects\nEnsure security and compliance\nProvide technical leadership",
                'benefits' => "Competitive salary\nStock options\nFlexible hours\nHealth and dental insurance\nAnnual conference budget",
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($jobs as $job) {
            JobListing::firstOrCreate(['slug' => $job['slug']], $job);
        }

        // Create Testimonials (matches testimonials migration)
        $testimonials = [
            [
                'client_name' => 'Robert Johnson',
                'client_position' => 'CTO',
                'client_company' => 'TechCorp Inc.',
                'content' => 'Onyx Innovations delivered a custom software solution that transformed our operations. Their team understood our needs and exceeded expectations.',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Amanda Williams',
                'client_position' => 'VP of Engineering',
                'client_company' => 'DataFlow Systems',
                'content' => 'Working with Onyx was a game-changer for our cloud migration. Professional, knowledgeable, and always on schedule.',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'James Martinez',
                'client_position' => 'Director of IT',
                'client_company' => 'GlobalHealth',
                'content' => 'Their expertise in healthcare IT and compliance made them the perfect partner for our digital transformation journey.',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::firstOrCreate(['client_name' => $testimonial['client_name']], $testimonial);
        }

        // Create Settings (matches settings migration)
        $settings = [
            ['key' => 'site_name', 'value' => 'Onyx Innovations Ltd', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Transforming Businesses Through Technology', 'type' => 'text', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'info@onyxinnovations.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+1 (234) 567-8900', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => '123 Technology Park, Innovation City, IC 12345', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/onyxinnovations', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/onyxinnovations', 'type' => 'text', 'group' => 'social'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/onyxinnovations', 'type' => 'text', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }

        // Create Partners (matches partners migration)
        $partners = [
            ['name' => 'Microsoft', 'logo' => 'partners/microsoft.png', 'website' => 'https://microsoft.com', 'type' => 'technology', 'is_active' => true, 'sort_order' => 1],
            ['name' => 'Amazon Web Services', 'logo' => 'partners/aws.png', 'website' => 'https://aws.amazon.com', 'type' => 'technology', 'is_active' => true, 'sort_order' => 2],
            ['name' => 'Google Cloud', 'logo' => 'partners/gcp.png', 'website' => 'https://cloud.google.com', 'type' => 'technology', 'is_active' => true, 'sort_order' => 3],
            ['name' => 'Salesforce', 'logo' => 'partners/salesforce.png', 'website' => 'https://salesforce.com', 'type' => 'strategic', 'is_active' => true, 'sort_order' => 4],
        ];

        foreach ($partners as $partner) {
            Partner::firstOrCreate(['name' => $partner['name']], $partner);
        }
    }
}
