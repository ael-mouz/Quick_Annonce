import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import 'react-confirm-alert/src/react-confirm-alert.css';
// import k from '../../../../../backend/public/images/1687391740.png';


const ValidatePosts = () => {
    const [posts, setPosts] = useState([]);
    const [success, setSuccess] = useState('');

    const location = useLocation();
    const token = location.state.token;
    const id = location.state.id;

    //fetching the users data
    useEffect(() => {
        const fetchPosts = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/post/showInvalidatedPosts"
                );
                setPosts(response.data);
            } catch (error) {
                console.error("Error:", error);
            }
        };

        fetchPosts();
    }, [posts]);


    const HandelValidate = async ( postId) => {
        try{
            const config = {
                headers: {
                  Authorization: `Bearer ${token}`,
                },
            };

            await axios.post(`http://127.0.0.1:8000/api/post/validation/${postId}` , config);
            setSuccess(`L'annonce valider`)
            setPosts((prevPosts) => prevPosts.filter((post) => post.id !== postId));
        }catch(error) {
            console.log('Error : ' ,error);
        }
    };
      
    return (
        <>  
            <h3>Validation des Annonces</h3>
            {success && <p className="alert alert-success">{success}</p>}
            <table class="table  table-bordered">
                <thead className="table-primary ">
                    <tr>
                        <th scope="col">image</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Category</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {posts.map((post) => (
                        <tr className="text-left" key={post.id}>
                            <td><img src={`../../../../../../backend/public/'${post.picture_1}`}></img> {post.picture_1}</td>
                            <td>{post.title}</td>
                            <td>{post.description}</td>
                            <td>{post.price}</td>
                            <td>{post.email}</td>
                            <td>{post.phone}</td>
                            <td>{post.Category}</td>
                            <td>{post.ville}</td>
                            <td>
                            {post.id !== id ? (
                                    <button
                                    className="btn btn-danger"
                                        variant="danger"
                                        onClick={() => HandelValidate(post.id)}
                                    >
                                        Valider
                                    </button>
                                ) : (
                                        'admin'
                                )}
                            </td>

                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    );
};

export default ValidatePosts;
