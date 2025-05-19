# email-notification
How to send email to customer who purchased the product and if downloadable file is updated with new version?

This code help you send email to customer about downloadable file update in WooCommerce.

Automatically Notify Customers About Download File Updates in WooCommerce
If you sell digital products on your WooCommerce store, keeping customers informed about product updates is crucial. Whether it's a plugin, theme, PDF, or software file, users appreciate knowing when new versions or files are added. That’s why we created a custom WooCommerce solution that automatically sends an email to customers whenever a new downloadable file is added to a product they’ve purchased.

🔧 Why This Feature Matters
WooCommerce doesn’t natively notify customers about new downloadable files added post-purchase. That means your users might miss important updates unless they manually check their account.

Our code solves this problem by:

📩 Automatically sending an email notification to previous buyers

📂 Triggering when a new downloadable file is added to a product

🔁 Ensuring customers are always in the loop with the latest version or update

✅ Key Features
Automatic Detection: Monitors changes to downloadable files in WooCommerce products.

Targeted Emails: Sends update notifications only to customers who purchased the specific product.

Custom Email Template: Personalized messaging to keep your brand consistent.

Improves Customer Experience: Increases trust and keeps users coming back for updates.

💡 Use Cases
GPL Product Stores like UltraPlugins.store: Notify users when a GPL theme or plugin is updated.

E-learning Platforms: Let students know when a new lesson PDF or resource is available.

Software Licensing: Inform buyers of the latest software patch or release.

🔍 SEO Benefits
Not only does this feature enhance UX, but it also reduces refund requests, increases customer retention, and can even reduce support tickets. If you're offering GPL themes and plugins, this feature makes your store stand out by delivering proactive customer service.

🧩 How It Works (Code Overview)
We’ve written a custom snippet that hooks into WooCommerce product update actions. Whenever an admin adds a new downloadable file to a product, the system checks for recent changes and notifies customers via email.

Here's a simplified overview of what the code does:

Hooks into the save_post_product action

Compares previous and updated download file counts

Queries completed orders related to that product

Sends a branded email to each eligible customer

Want the code? Contact us or leave a comment below and we’ll help you implement it on your WooCommerce store.
