<?php
// Login Page Design
echo '<header style="background-color: #0073e6; color: white; padding: 15px; text-align: center;">';
echo '<h1 style="margin: 0; font-size: 1.8rem;">Login</h1>';
echo '</header>';

echo '<div style="padding: 20px; max-width: 400px; margin: 30px auto; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';

echo '<form method="post" action="index.php" style="display: flex; flex-direction: column; gap: 15px;">';

echo '<label for="username" style="font-size: 1.2rem; color: #0073e6;">Username:</label>';
echo '<input type="text" id="username" name="username" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';

echo '<label for="password" style="font-size: 1.2rem; color: #0073e6;">Password:</label>';
echo '<input type="password" id="password" name="password" required style="padding: 10px; font-size: 1rem; border: 1px solid #ddd; border-radius: 5px;">';

echo '<button type="submit" style="padding: 10px; font-size: 1rem; background-color: #0073e6; color: white; border: none; border-radius: 5px; cursor: pointer;">Login</button>';

echo '</form>';
echo '</div>';
?>