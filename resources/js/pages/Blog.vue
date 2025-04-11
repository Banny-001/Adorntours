<template>
    <div class="blog-app">
      <!-- Hero Section with Animated Background -->
      <section class="hero">
        <div class="hero-content">
          <h1 class="hero-title">Educational Travel Insights</h1>
          <p class="hero-subtitle">Discover stories that inspire learning beyond the classroom</p>
          <v-btn 
            color="white" 
            variant="outlined"
            class="explore-btn"
            @click="scrollToContent"
          >
            Explore Articles
            <v-icon right>mdi-arrow-down</v-icon>
          </v-btn>
        </div>
        <div class="hero-overlay"></div>
      </section>
  
      <!-- Main Content -->
      <main class="main-content">
        <!-- Featured Post -->
        <section v-if="!selectedPost && featuredPost" class="featured-post">
          <div class="section-header">
            <v-icon color="primary">mdi-star</v-icon>
            <h2>Featured Story</h2>
          </div>
          <div class="featured-card" @click="selectPost(featuredPost)">
            <v-img
              :src="featuredPost.image || defaultImage"
              class="featured-image"
              cover
              gradient="to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5)"
            ></v-img>
            <div class="featured-content">
              <div class="post-meta">
                <span class="post-category">{{ featuredPost.category || 'Education' }}</span>
                <span class="post-date">{{ formatDate(featuredPost.date) }}</span>
              </div>
              <h3 class="post-title">{{ featuredPost.title }}</h3>
              <p class="post-excerpt">{{ getExcerpt(featuredPost.content, 150) }}</p>
              <div class="author-info">
                <v-avatar size="40" color="primary">
                  <v-img v-if="featuredPost.authorAvatar" :src="featuredPost.authorAvatar"></v-img>
                  <span v-else class="white--text">{{ getInitials(featuredPost.author) }}</span>
                </v-avatar>
                <div>
                  <p class="author-name">{{ featuredPost.author || 'Admin' }}</p>
                  <p class="read-time">{{ calculateReadTime(featuredPost.content) }} min read</p>
                </div>
              </div>
            </div>
          </div>
        </section>
  
        <!-- Blog Post Detail View -->
        <article v-if="selectedPost" class="post-detail">
          <v-btn 
            variant="text" 
            color="primary"
            @click="selectedPost = null"
            class="back-btn"
          >
            <v-icon left>mdi-arrow-left</v-icon>
            Back to all posts
          </v-btn>
  
          <header class="post-header">
            <div class="post-meta">
              <v-chip 
                v-for="(tag, i) in selectedPost.tags" 
                :key="i"
                class="mr-2 mb-2"
                :color="tagColors[i % tagColors.length]"
                small
              >
                {{ tag }}
              </v-chip>
              <span class="post-date">{{ formatDate(selectedPost.date) }}</span>
            </div>
            <h1 class="post-title">{{ selectedPost.title }}</h1>
            <div class="author-info">
              <v-avatar size="48" color="primary">
                <v-img v-if="selectedPost.authorAvatar" :src="selectedPost.authorAvatar"></v-img>
                <span v-else class="white--text">{{ getInitials(selectedPost.author) }}</span>
              </v-avatar>
              <div>
                <p class="author-name">{{ selectedPost.author || 'Admin' }}</p>
                <p class="read-time">{{ calculateReadTime(selectedPost.content) }} min read</p>
              </div>
            </div>
          </header>
  
          <v-img
            :src="selectedPost.image || defaultImage"
            class="post-image"
            cover
          ></v-img>
  
          <div class="post-content" v-html="selectedPost.content"></div>
  
          <!-- Social Sharing -->
          <div class="social-sharing">
            <p>Share this post:</p>
            <div class="social-icons">
              <v-btn
                v-for="social in socialPlatforms"
                :key="social.name"
                :color="social.color"
                icon
                variant="text"
                size="small"
                @click="sharePost(social.name)"
              >
                <v-icon>{{ social.icon }}</v-icon>
              </v-btn>
            </div>
          </div>
  
          <!-- Related Posts -->
          <section class="related-posts">
            <h3>You might also like</h3>
            <div class="related-grid">
              <div 
                v-for="post in relatedPosts" 
                :key="post.id"
                class="related-card"
                @click="selectPost(post)"
              >
                <v-img
                  :src="post.image || defaultImage"
                  class="related-image"
                  cover
                ></v-img>
                <div class="related-content">
                  <h4>{{ post.title }}</h4>
                  <p class="related-excerpt">{{ getExcerpt(post.content, 100) }}</p>
                </div>
              </div>
            </div>
          </section>
        </article>
  
        <!-- Blog Post Grid View -->
        <section v-else class="post-grid">
          <div class="section-header">
            <h2>Latest Articles</h2>
            <v-text-field
              v-model="searchQuery"
              placeholder="Search articles..."
              prepend-inner-icon="mdi-magnify"
              variant="outlined"
              hide-details
              single-line
              class="search-field"
              @input="filterPosts"
            ></v-text-field>
          </div>
  
          <div class="grid-container">
            <div 
              v-for="post in filteredPosts" 
              :key="post.id"
              class="post-card"
              @click="selectPost(post)"
            >
              <v-img
                :src="post.image || defaultImage"
                class="post-thumbnail"
                cover
              ></v-img>
              <div class="card-content">
                <div class="post-meta">
                  <span class="post-category">{{ post.category || 'Education' }}</span>
                  <span class="post-date">{{ formatDate(post.date) }}</span>
                </div>
                <h3 class="post-title">{{ post.title }}</h3>
                <p class="post-excerpt">{{ getExcerpt(post.content, 120) }}</p>
                <div class="card-footer">
                  <div class="author-info">
                    <v-avatar size="32" color="primary">
                      <v-img v-if="post.authorAvatar" :src="post.authorAvatar"></v-img>
                      <span v-else class="white--text">{{ getInitials(post.author) }}</span>
                    </v-avatar>
                    <span class="author-name">{{ post.author || 'Admin' }}</span>
                  </div>
                  <span class="read-time">{{ calculateReadTime(post.content) }} min read</span>
                </div>
              </div>
            </div>
          </div>
  
          <v-pagination
            v-if="totalPages > 1"
            v-model="currentPage"
            :length="totalPages"
            :total-visible="7"
            color="primary"
            class="pagination"
          ></v-pagination>
        </section>
  
        <!-- Newsletter Subscription -->
        <section class="newsletter">
          <div class="newsletter-content">
            <v-icon size="64" color="primary">mdi-email-newsletter</v-icon>
            <h3>Stay Updated</h3>
            <p>Get the latest educational travel insights delivered to your inbox</p>
            <div class="subscribe-form">
              <v-text-field
                v-model="email"
                placeholder="Your email address"
                variant="outlined"
                hide-details
                single-line
                class="email-input"
              ></v-text-field>
              <v-btn
                color="primary"
                @click="subscribe"
                class="subscribe-btn"
              >
                Subscribe
              </v-btn>
            </div>
            <p class="disclaimer">We respect your privacy. Unsubscribe at any time.</p>
          </div>
        </section>
      </main>
    </div>
  </template>
  
  <script setup>
  import { ref, computed, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  
  const router = useRouter()
  
  // Data
  const posts = ref([])
  const selectedPost = ref(null)
  const searchQuery = ref('')
  const currentPage = ref(1)
  const postsPerPage = 6
  const email = ref('')
  const defaultImage = 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80'
  const tagColors = ['primary', 'secondary', 'success', 'info', 'warning', 'error']
  const socialPlatforms = [
    { name: 'twitter', icon: 'mdi-twitter', color: '#1DA1F2' },
    { name: 'facebook', icon: 'mdi-facebook', color: '#1877F2' },
    { name: 'linkedin', icon: 'mdi-linkedin', color: '#0077B5' },
    { name: 'whatsapp', icon: 'mdi-whatsapp', color: '#25D366' }
  ]
  
  // Computed
  const featuredPost = computed(() => {
    return posts.value.find(post => post.featured) || posts.value[0]
  })
  
  const filteredPosts = computed(() => {
    let result = [...posts.value]
    if (searchQuery.value) {
      const query = searchQuery.value.toLowerCase()
      result = result.filter(post => 
        post.title.toLowerCase().includes(query) || 
        post.content.toLowerCase().includes(query) ||
        (post.tags && post.tags.some(tag => tag.toLowerCase().includes(query))))
    }
    return result
  })
  
  const totalPages = computed(() => {
    return Math.ceil(filteredPosts.value.length / postsPerPage)
  })
  
  const paginatedPosts = computed(() => {
    const start = (currentPage.value - 1) * postsPerPage
    const end = start + postsPerPage
    return filteredPosts.value.slice(start, end)
  })
  
  const relatedPosts = computed(() => {
    if (!selectedPost.value) return []
    return posts.value
      .filter(post => post.id !== selectedPost.value.id)
      .slice(0, 3)
  })
  
  // Methods
  const getExcerpt = (content, length = 100) => {
    if (!content) return ''
    const textOnly = content.replace(/<[^>]*>/g, '')
    return textOnly.length > length ? textOnly.substring(0, length) + '...' : textOnly
  }
  
  const formatDate = (dateString) => {
    if (!dateString) return ''
    const options = { year: 'numeric', month: 'short', day: 'numeric' }
    return new Date(dateString).toLocaleDateString('en-US', options)
  }
  
  const calculateReadTime = (content) => {
    if (!content) return 1
    const wordCount = content.split(/\s+/).length
    return Math.max(1, Math.round(wordCount / 200))
  }
  
  const getInitials = (name) => {
    if (!name) return 'A'
    return name.split(' ').map(n => n[0]).join('').toUpperCase()
  }
  
  const selectPost = (post) => {
    selectedPost.value = post
    window.scrollTo({ top: 0, behavior: 'smooth' })
    router.push({ query: { post: post.id } })
  }
  
  const scrollToContent = () => {
    const element = document.querySelector('.main-content')
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' })
    }
  }
  
  const filterPosts = () => {
    currentPage.value = 1
  }
  
  const sharePost = (platform) => {
    if (!selectedPost.value) return
    
    const url = `${window.location.origin}${router.resolve({ 
      query: { post: selectedPost.value.id } 
    }).href}`
    
    const text = `Check out this article: ${selectedPost.value.title}`
    
    let shareUrl = ''
    switch (platform) {
      case 'twitter':
        shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`
        break
      case 'facebook':
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`
        break
      case 'linkedin':
        shareUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(url)}&title=${encodeURIComponent(selectedPost.value.title)}`
        break
      case 'whatsapp':
        shareUrl = `https://wa.me/?text=${encodeURIComponent(`${text} ${url}`)}`
        break
    }
    
    window.open(shareUrl, '_blank', 'width=600,height=400')
  }
  
  const subscribe = () => {
    alert(`Thank you for subscribing with ${email.value}!`)
    email.value = ''
  }
  
  // Lifecycle
  onMounted(async () => {
    try {
      // In a real app, fetch from your API
      // const response = await axios.get('/api/posts')
      // posts.value = response.data
      
      // Mock data for demonstration
      posts.value = Array.from({ length: 12 }, (_, i) => ({
        id: `post-${i + 1}`,
        title: `The Ultimate Guide to ${['Student', 'Educational', 'Cultural', 'Adventure'][i % 4]} Travel in ${['Europe', 'Asia', 'Africa', 'South America'][i % 4]}`,
        content: `<p>This is a detailed blog post about educational travel experiences. It includes insights, tips, and personal stories that will inspire your next journey. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
        <p>Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio.</p>
        <h2>Why Educational Travel Matters</h2>
        <p>Proin convallis mi ac felis pharetra aliquam. Curabitur dignissim accumsan rutrum. In arcu magna, aliquet vel pretium et, molestie et arcu. Mauris lobortis nulla et felis ullamcorper bibendum.</p>`,
        image: `https://source.unsplash.com/random/800x600/?travel,${i}`,
        date: new Date(Date.now() - Math.floor(Math.random() * 30) * 24 * 60 * 60 * 1000).toISOString(),
        author: ['Alex Johnson', 'Maria Garcia', 'James Smith', 'Sarah Williams'][i % 4],
        authorAvatar: `https://i.pravatar.cc/150?img=${i % 10 + 1}`,
        tags: ['Travel Tips', 'Destinations', 'Education', 'Culture', 'Adventure'].slice(0, (i % 3) + 2),
        featured: i === 0,
        category: ['Travel Tips', 'Destinations', 'Education', 'Culture'][i % 4]
      }))
      
      // Check URL for post parameter
      const postId = router.currentRoute.value.query.post
      if (postId) {
        const post = posts.value.find(p => p.id === postId)
        if (post) selectedPost.value = post
      }
    } catch (error) {
      console.error('Error loading posts:', error)
    }
  })
  </script>
  
  <style scoped>
  .blog-app {
    font-family: 'Poppins', sans-serif;
    color: #333;
  }
  
  /* Hero Section */
  .hero {
    position: relative;
    height: 70vh;
    min-height: 500px;
    background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    overflow: hidden;
  }
  
  .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
    z-index: 1;
  }
  
  .hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    padding: 0 20px;
  }
  
  .hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 16px;
    animation: fadeInDown 1s ease;
  }
  
  .hero-subtitle {
    font-size: 1.5rem;
    margin-bottom: 32px;
    animation: fadeInUp 1s ease 0.3s forwards;
    opacity: 0;
  }
  
  .explore-btn {
    animation: fadeInUp 1s ease 0.6s forwards;
    opacity: 0;
  }
  
  /* Main Content */
  .main-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
  }
  
  .section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
  }
  
  .section-header h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: #2d3748;
  }
  
  .search-field {
    max-width: 300px;
  }
  
  /* Featured Post */
  .featured-post {
    margin-bottom: 60px;
  }
  
  .featured-card {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
  }
  
  .featured-card:hover {
    transform: translateY(-5px);
  }
  
  .featured-image {
    height: 500px;
  }
  
  .featured-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 40px;
    color: white;
    background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
  }
  
  .post-meta {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
  }
  
  .post-category {
    background-color: rgba(255, 255, 255, 0.2);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-right: 12px;
  }
  
  .post-date {
    font-size: 0.9rem;
    opacity: 0.9;
  }
  
  .post-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 16px;
  }
  
  .post-excerpt {
    font-size: 1.1rem;
    margin-bottom: 24px;
    line-height: 1.6;
  }
  
  .author-info {
    display: flex;
    align-items: center;
  }
  
  .author-name {
    font-weight: 600;
    margin-left: 12px;
  }
  
  .read-time {
    font-size: 0.8rem;
    opacity: 0.8;
    margin-left: 12px;
  }
  
  /* Post Grid */
  .grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
  }
  
  .post-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
  }
  
  .post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
  }
  
  .post-thumbnail {
    height: 200px;
  }
  
  .card-content {
    padding: 20px;
  }
  
  .card-content .post-title {
    font-size: 1.3rem;
    margin: 12px 0;
  }
  
  .card-content .post-excerpt {
    font-size: 0.95rem;
    color: #4a5568;
    margin-bottom: 16px;
  }
  
  .card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 16px;
  }
  
  /* Post Detail */
  .post-detail {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .back-btn {
    margin-bottom: 30px;
  }
  
  .post-header {
    margin-bottom: 40px;
  }
  
  .post-header .post-title {
    font-size: 2.5rem;
    margin: 20px 0;
    color: #2d3748;
  }
  
  .post-image {
    height: 450px;
    border-radius: 12px;
    margin-bottom: 40px;
  }
  
  .post-content {
    line-height: 1.8;
    font-size: 1.1rem;
    color: #4a5568;
  }
  
  .post-content :deep(p) {
    margin-bottom: 24px;
  }
  
  .post-content :deep(h2) {
    font-size: 1.8rem;
    margin: 40px 0 20px;
    color: #2d3748;
  }
  
  .post-content :deep(h3) {
    font-size: 1.4rem;
    margin: 30px 0 15px;
    color: #2d3748;
  }
  
  .post-content :deep(a) {
    color: #4f46e5;
    text-decoration: underline;
  }
  
  .post-content :deep(ul),
  .post-content :deep(ol) {
    margin-bottom: 24px;
    padding-left: 24px;
  }
  
  .post-content :deep(li) {
    margin-bottom: 8px;
  }
  
  /* Social Sharing */
  .social-sharing {
    display: flex;
    align-items: center;
    margin: 60px 0;
    padding: 20px 0;
    border-top: 1px solid #e2e8f0;
    border-bottom: 1px solid #e2e8f0;
  }
  
  .social-sharing p {
    margin-right: 20px;
    font-weight: 600;
  }
  
  .social-icons {
    display: flex;
    gap: 12px;
  }
  
  /* Related Posts */
  .related-posts {
    margin-top: 60px;
  }
  
  .related-posts h3 {
    font-size: 1.5rem;
    margin-bottom: 30px;
  }
  
  .related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
  }
  
  .related-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .related-card:hover {
    transform: translateY(-5px);
  }
  
  .related-image {
    height: 150px;
  }
  
  .related-content {
    padding: 16px;
  }
  
  .related-content h4 {
    font-size: 1.1rem;
    margin-bottom: 8px;
  }
  
  .related-excerpt {
    font-size: 0.9rem;
    color: #4a5568;
  }
  
  /* Newsletter */
  .newsletter {
    background-color: #f7fafc;
    border-radius: 12px;
    padding: 60px 40px;
    margin-top: 80px;
    text-align: center;
  }
  
  .newsletter-content {
    max-width: 600px;
    margin: 0 auto;
  }
  
  .newsletter h3 {
    font-size: 1.8rem;
    margin: 20px 0 10px;
    color: #2d3748;
  }
  
  .newsletter p {
    font-size: 1.1rem;
    color: #4a5568;
    margin-bottom: 30px;
  }
  
  .subscribe-form {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
  }
  
  .email-input {
    flex: 1;
    margin-right: 12px;
  }
  
  .disclaimer {
    font-size: 0.9rem;
    color: #718096;
    margin-top: 20px;
  }
  
  /* Pagination */
  .pagination {
    margin-top: 40px;
    display: flex;
    justify-content: center;
  }
  
  /* Animations */
  @keyframes fadeInDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .hero-title {
      font-size: 2.2rem;
    }
    
    .hero-subtitle {
      font-size: 1.2rem;
    }
    
    .section-header {
      flex-direction: column;
      align-items: flex-start;
    }
    
    .search-field {
      max-width: 100%;
      margin-top: 16px;
    }
    
    .featured-image {
      height: 400px;
    }
    
    .featured-content {
      padding: 20px;
    }
    
    .post-header .post-title {
      font-size: 2rem;
    }
    
    .post-image {
      height: 300px;
    }
    
    .grid-container {
      grid-template-columns: 1fr;
    }
    
    .subscribe-form {
      flex-direction: column;
    }
    
    .email-input {
      margin-right: 0;
      margin-bottom: 12px;
    }
  }
  </style>