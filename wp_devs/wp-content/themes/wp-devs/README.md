## Resources

Extensions:

- Query Monitor
- Show Current Template
- Loco Translate or polylang
- https://wpmudev.com/blog/how-to-build-your-own-wordpress-contact-form-and-why/

### On Deploy

- zip, including the wp stuff, and push
- update `functions.php` to version the assets. Caching is important!
- update `wp_config.php` to set database creds. The MySQL user should have all permissions.
- Dump the DB, then:
  - update `wp-options>site-url>option-value` to your domain
  - update `wp-options>home>option-value` to your domain
- Update posts meta:

```sql
UPDATE wp_posts SET guid = replace(guid, 'http://localhost', 'http://your-domain.com');
UPDATE wp_posts SET post_content = replace(post_content, 'http://localhost', 'http://your-domain.com');
UPDATE wp_postsmeta SET meta_value = replace(meta_value, 'http://localhost', 'http://your-domain.com');
```

- Go to **Settings** -> **Permalinks**, and save without making changes.
