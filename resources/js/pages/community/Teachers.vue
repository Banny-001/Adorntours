<template>
    <div class="font-sans bg-gray-50">
        <!-- Hero Section -->
        <section
        class="relative min-h-[80vh] bg-cover bg-center flex items-center"
        style="background-image: url('/images/teacher-hero.jpg')"
      >
      
        <div class="relative z-10 container mx-auto px-6 text-center">
          <div class="max-w-3xl mx-auto">
            <h1
              class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-purple leading-tight mb-6 drop-shadow-lg"
            >
              Empowering Educators, Enriching Lives
            </h1>
      
            <p class="text-xl text-white/90 mb-8 leading-relaxed">
              At Adorn DMC, we champion the role of teachers by offering curated travel experiences 
              that bring education to life — beyond the classroom.
            </p>
      
            <div class="flex flex-col sm:flex-row justify-center gap-4">
              <v-btn
                color="primary"
                size="x-large"
                rounded="lg"
                class="px-8 py-3 font-semibold shadow-md"
                :to="{ path: '/plan-tour' }"
              >
                Plan Your Tour
              </v-btn>
      
              <v-btn
                variant="outlined"
                color="white"
                size="x-large"
                rounded="lg"
                class="px-8 py-3 font-semibold border-white"
                :to="{ path: '/teacher-resource' }"
              >
                Explore Resources
              </v-btn>
            </div>
          </div>
        </div>
      </section>
      
        <!-- Benefits Section -->
        <section class="py-20 md:py-28 bg-gradient-to-b from-white to-purple-50">
            <div class="container mx-auto px-6">
              <!-- Heading -->
              <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-purple-900 mb-4 leading-snug">
                  Why Teachers Love Our Tours
                </h2>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                  Crafted with care by educators for educators, our tours offer a powerful blend of learning, leadership, and unforgettable experiences.
                </p>
              </div>
          
              <!-- Features Grid -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 hover:shadow-2xl transition-all duration-300 px-3">
                  <div class=" text-purple-600 flex justify-center mb-5 mb-3">
                    <v-icon size="48">mdi-book-education</v-icon>
                  </div>
                  <h3 class="text-xl font-semibold flex justify-center text-purple-900 mb-3">
                    Curriculum Integration
                  </h3>
                  <p class="text-gray-600 leading-relaxed">
                    Each itinerary is built to complement your syllabus with pre-trip and post-trip resources tied to learning goals.
                  </p>
                </div>
          
                <!-- Card 2 -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 hover:shadow-2xl transition-all duration-300 px-3">
                  <div class=" text-purple-600 flex justify-center mb-5 mb-3" >
                    <v-icon size="48">mdi-certificate</v-icon>
                  </div>
                  <h3  class="text-xl font-semibold flex justify-center text-purple-900 mb-3">
                    Professional Development
                  </h3>
                  <p class="text-gray-600 leading-relaxed">
                    Receive professional recognition and continuing education credits while guiding your students on life-changing experiences.
                  </p>
                </div>
          
                <!-- Card 3 -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-purple-100 hover:shadow-2xl transition-all duration-300 px-3">
                  <div class=" text-purple-600 flex justify-center mb-5 mb-3" >
                    <v-icon size="48">mdi-account-group</v-icon>
                  </div>
                  <h3 class="text-xl font-semibold flex justify-center text-purple-900 mb-3">
                    Student Transformation
                  </h3>
                  <p class="text-gray-600 leading-relaxed">
                    Watch students grow into more confident, curious, and globally aware citizens through meaningful travel experiences.
                  </p>
                </div>
              </div>
            </div>
          </section>
          

        <!-- Resources Section -->
        <section class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <v-img
                            
                           src="../images/teacher-2.jpg"
                            class="rounded-xl shadow-lg  h-full"
                            aspect-ratio="16/9"
                            cover
                        ></v-img>
                    </div>
                    <div class="lg:w-1/2 h-full ">
                        <h2
                            class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                        >
                            Comprehensive Teacher Resources
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            We provide everything you need to plan, promote, and
                            execute a successful educational tour.
                        </p>

                        <div class="space-y-6">
                            <div
                                v-for="(resource, i) in resources"
                                :key="i"
                                class="flex items-start"
                            >
                                <div
                                    class="flex-shrink-0 bg-purple-100 rounded-lg p-2 mr-4"
                                >
                                    <v-icon color="purple">{{
                                        resource.icon
                                    }}</v-icon>
                                </div>
                                <div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900"
                                    >
                                        {{ resource.title }}
                                    </h3>
                                    <p class="text-gray-600">
                                        {{ resource.description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <v-btn
                            color="primary"
                            size="large"
                            rounded="lg"
                            class="mt-8 px-8 py-3 font-semibold"
                            href="/pdfs/resource-kit.pdf"
                        >
                            Download Resource Kit
                        </v-btn>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6 ">
                <div class="text-center max-w-3xl mx-auto mb-16 px-3">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-purple-900 mb-4 px-3"
                    >
                        Hear From Fellow Educators
                    </h2>
                    <p class="text-lg text-gray-600">
                        Teachers share how our educational tours have
                        transformed their classrooms.
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-3"
                >
                    <div
                        v-for="(testimonial, i) in testimonials"
                        :key="i"
                        class="bg-gray-50 rounded-xl p-8"
                    >
                        <div class="flex items-center mb-4">
                            <div
                                class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-4 "
                            >
                                <v-icon>mdi-account</v-icon>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 px-3">
                                    {{ testimonial.name }}
                                </h4>
                                <p class="text-sm text-gray-500 px-3">
                                    {{ testimonial.role }}
                                </p>
                            </div>
                        </div>
                        <p class="text-gray-700 italic px-3">
                            "{{ testimonial.quote }}"
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-16 md:py-24 bg-gradient-to-r from-purple-600 to-indigo-700"
        >
            <div class="container mx-auto text-center max-w-3xl">
              <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
                Ready to Lead the Journey?
              </h2>
              <p class="text-lg md:text-xl text-black/90 mb-10">
                Join thousands of visionary educators transforming classrooms through immersive global experiences.
              </p>
              <div class="flex flex-col sm:flex-row justify-center gap-4">
                <v-btn
                  color="white"
                  size="x-large"
                  rounded="lg"
                  class="px-8 py-3 font-semibold text-purple-700 hover:bg-gray-100 transition"
                  :to="{ path: '/contact' }"
                >
                  Speak to a Tour Consultant
                </v-btn>
                <v-btn
                  variant="outlined"
                  color="white"
                  size="x-large"
                  rounded="lg"
                  class="px-8 py-3 font-semibold border-white text-purple hover:bg-white/10 transition"
                  :to="{ path: '/teacher-faq' }"
                >
                  View FAQs
                </v-btn>
              </div>
            </div>
          </section>
          
       
    </div>
</template>

<script setup>
const resources = [
    {
        icon: "mdi-file-document",
        title: "Pre-Departure Materials",
        description:
            "Lesson plans, activities, and reading lists to prepare students",
    },
    {
        icon: "mdi-email",
        title: "Parent Communication Templates",
        description:
            "Ready-to-use emails and presentations for parent meetings",
    },
    {
        icon: "mdi-cash-multiple",
        title: "Fundraising Guides",
        description: "Proven strategies to help students finance their trip",
    },
    {
        icon: "mdi-check-decagram",
        title: "Administrative Approval Kit",
        description: "Documents to streamline school approval processes",
    },
];

const testimonials = [
    {
        name: "Sarah Johnson",
        role: "High School History Teacher",
        quote: "The curriculum connections made our tour to Rome an extension of our classroom. Students returned with deeper understanding and enthusiasm.",
    },
    {
        name: "Michael Chen",
        role: "Middle School Science Teacher",
        quote: "The professional development component gave me new teaching strategies I still use in my classroom today.",
    },
    {
        name: "Emily Rodriguez",
        role: "Language Department Chair",
        quote: "Watching my students gain confidence speaking Spanish in Barcelona was more rewarding than any test score.",
    },
];
</script>

<style scoped>
/* Smooth scrolling for anchor links */
html {
    scroll-behavior: smooth;
}

/* Custom animation for elements */
.fade-in {
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
