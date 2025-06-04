# श्री हरि व्यास निकुंज मंदिर - Nimbarka Sampradaya Website

A modern, mobile-first website for the Nimbarka Sampradaya ashram in Vrindavan, built with Laravel and contemporary web technologies while honoring traditional spiritual values.

## 🕉️ About

This website serves the Shri Hari Vyas Nikunja Mandir ashram community by providing:

- **Philosophy & Teachings**: Deep dive into Dvaita-Advaita philosophy, Radha-Krishna bhakti, sadhana practices, and moksha concepts
- **Parampara Lineage**: Complete acharya lineage from Nimbarkacharya through contemporary gurus
- **Daily Life**: Ashram schedules, prasadam offerings, rules, and living guidelines  
- **Seva Opportunities**: Ways to serve the community and participate in ashram life
- **Sacred Texts**: Digital access to Vedanta Parijata Saurabha, Dasha Shloki, and Mahavani
- **Community Features**: Festival calendars, photo galleries, kirtan collections, and digital media
- **Practical Info**: Contact details, donation systems, FAQ, and visit planning

Built for devotees worldwide to connect with authentic Nimbarka teachings and the Vrindavan ashram community.

## 🛠️ Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Livewire 3.x + Alpine.js 3.x
- **Styling**: Tailwind CSS + DaisyUI
- **Database**: MySQL
- **Server**: PHP 8.3+

## 🚀 Local Installation

### Prerequisites

- PHP 8.3 or higher
- Composer
- Node.js & npm
- MySQL
- Git

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/username/nimbarka-sampradaya-website.git
   cd nimbarka-sampradaya-website
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   
   Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nimbarka_sampradaya
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations & seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start development server**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

### Development Workflow

For active development with hot reloading:

```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Asset compilation with watch
npm run dev
```

## 📁 Project Structure

```
app/
├── Livewire/           # Livewire components for each page
│   ├── About/          # History, MaharajJi, NimbarkaSampradaya  
│   ├── Philosophy/     # DvaitaAdvaita, RadhaKrishnaBhakti, etc.
│   ├── Parampara/      # Lineage and individual acharyas
│   ├── DailyLife/      # Schedule, Prasadam, Rules
│   ├── Seva/           # Opportunities, AshramLife, Donate
│   └── Texts/          # Sacred texts and teachings
├── Models/             # Eloquent models
└── Http/Controllers/   # Additional controllers if needed

resources/
├── views/
│   ├── livewire/       # Livewire component views
│   └── layouts/        # App layouts and partials
├── css/                # Custom CSS (minimal, mostly Tailwind)
└── js/                 # Alpine.js components and utilities

database/
├── migrations/         # Database schema
└── seeders/           # Sample data for development
```

## 🎨 Design System

- **Colors**: Saffron/orange primary, cream backgrounds, deep blues for accents
- **Typography**: Clean sans-serif for UI, serif for Sanskrit/devotional content
- **Components**: DaisyUI component library with spiritual customizations
- **Icons**: Font Awesome + traditional spiritual symbols
- **Mobile-First**: Responsive design optimized for mobile devotees

## 🔧 Custom Artisan Commands

The project includes a custom CRUD generator:

```bash
# Generate complete CRUD system for a model
php artisan make:cruds ModelName
```

This creates model, migration, controller, Livewire components, and views in one command.

## 📱 Key Features

- **Responsive Design**: Mobile-first approach for devotees on all devices
- **Interactive Elements**: Audio players for kirtan, modal galleries, collapsible content
- **Search Functionality**: Global search for Sanskrit terms and content
- **Offline Reading**: Service worker for sacred texts accessibility
- **Multi-language**: Sanskrit terms with English translations
- **Accessibility**: Screen reader friendly, keyboard navigation support

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

Please ensure your code follows Laravel conventions and includes appropriate tests.

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 🙏 Acknowledgments

- Nimbarka Sampradaya tradition and teachings
- Shri Hari Vyas Nikunja Mandir community
- Open source community for the excellent tools and libraries

---

**जय श्री राधे कृष्ण** 🕉️

For questions or support, please contact [contact@harinikunj.org](mailto:contact@harinikunj.org)
